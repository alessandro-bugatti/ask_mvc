<?php

require_once ('conf/config.php');

/**
 * Funzione per il caricamento automatico delle classi
 * Ogni volta che nel codice viene creato un oggetto di una certa classe
 * viene incluso il file che la riguarda:
 * Es: se la classe fosse Util\Request verrà incluso il file Request che
 * si trova nella cartella Util
 */

spl_autoload_register(function ($class_name) {
    include_once __DIR__ . '/' . str_replace('\\','/', $class_name) . '.php';
});

use Util\Request as Request;
use Util\Router as Router;
use Util\Dispatcher as Dispatcher;

/**
 * Esempio di creazione di una richiesta
 * con la stampa del metodo e del path
 */
$request = new Request($ROOT);
echo '<p>Metodo della richiesta: ' . $request->getMethod() . '</p>';
echo '<p>Percorso della richiesta: ' . $request->getPath() . '</p>';

/**
 * Aggiunta della stampa di eventuali variabili get e post
 */

$get = $request->getGetParameters();
$post = $request->getPostParameters();

if ($request->hasGetParams()) {
    echo '<h2>Parametri GET</h2><pre>';
    var_dump($get);
    echo '</pre>';
}
else
    echo "<p>La richiesta non contiene parametri GET</p>";


if ($request->hasPostParams()){
    echo '<h2>Parametri POST</h2><pre>';
    var_dump($post);
    echo '</pre>';
}
else
    echo "<p>La richiesta non contiene parametri POST</p>";

$router = new Router();
$router->get('foo', function() { echo "GET foo\n"; })
       ->post('bar', function() { echo "POST bar\n"; });

$dispatcher = new Dispatcher($router);

$dispatcher->handle($request);

