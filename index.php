<?php

require_once('conf/config.php');
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Funzione per il caricamento automatico delle classi
 * Ogni volta che nel codice viene creato un oggetto di una certa classe
 * viene incluso il file che la riguarda:
 * Es: se la classe fosse Util\Request verrà incluso il file Request che
 * si trova nella cartella Util
 */

spl_autoload_register(function ($class_name) {
    include_once __DIR__ . '/' . str_replace('\\', '/', $class_name) . '.php';
});

use Controller\PageNotFoundController;
use Controller\QuestionController;
use League\Plates\Engine;
use Util\Dispatcher as Dispatcher;
use Util\Request;
use Util\Router as Router;

$request = new Request($ROOT);

/**
 * Esempio semplice di utilizzo di un router e di un dispatcher
 */

$templates = new Engine('./View', 'tpl');

//Registra una funzione che può poi essere chiamata nei template
//per risolvere il problema dei riferimenti assoluti
//quando l'applicazione è installata in una sottocartella
//della root del server web
//Per utilizzarla nei template basterà scrivere
// <?=$this->root_path() ? > e restituisce la root effettiva
//dell'installazione

$templates->registerFunction('root_path', function () {
    return \Util\Helper::root_path();
});

$router = new Router();

$router->setPageNotFound(function () use ($templates) {
    $a = new PageNotFoundController($templates);
    $a->show();
}
);

$router->get('question/list', function () use ($templates) {
    $a = new QuestionController($templates);
    $a->list();
}
);

$router->get('question/form', function () use ($templates) {
    $a = new QuestionController($templates);
    $a->showForm();
}
);

$router->get('question/answer/form', function () use ($templates, $request) {
    $questionController = new QuestionController($templates, $request);
    $questionController->showAnswerForm();
}
);

$router->get('question/answer/list', function () use ($templates, $request) {
    $questionController = new QuestionController($templates);
    $questionController->answerList($request->getGetParameters()['question_id']);
}
);

$router->post('question/add', function () use ($templates, $request) {
    $a = new QuestionController($templates, $request);
    $a->add();
}
);

$router->post('question/answer/add', function () use ($templates, $request) {
    $questionController = new QuestionController($templates, $request);
    $questionController->addAnswer();
}
);

$dispatcher = new Dispatcher($router);

$dispatcher->handle($request);

