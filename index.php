<?php
spl_autoload_register(function ($class_name) {
    include_once __DIR__ . '/' . str_replace('\\','/',$class_name) . '.php';
});

use Util\Request as Request;

$request = new Request();
echo '<p>Metodo della richiesta: ' . $request->getMethod() . '</p>';
echo '<p>Percorso della richiesta: ' . $request->getPath() . '</p>';

