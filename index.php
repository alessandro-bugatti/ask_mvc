<?php
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

/**
 * Esempio di creazione di una richiesta
 * con la stampa del metodo e del path
 */
$request = new Request();
echo '<p>Metodo della richiesta: ' . $request->getMethod() . '</p>';
echo '<p>Percorso della richiesta: ' . $request->getPath() . '</p>';

