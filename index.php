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
use Util\Request as Request;
use Util\Router as Router;

$request = new Request($ROOT);

/**
 * Esempio semplice di utilizzo di un router e di un dispatcher
 */

$templates = new Engine('./View', 'tpl');


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

$dispatcher = new Dispatcher($router);

$dispatcher->handle($request);

