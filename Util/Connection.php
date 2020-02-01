<?php


namespace Util;

use PDO;

class Connection
{
    private static PDO $pdo;
    private static string $DSN;
    private static string $user;
    private static string $password;

    private function __construct()
    {

    }


    public static function getInstance() : PDO
    {
        if (!isset($pdo))
        {
            /**
             * Per semplicità tutti i parametri di connessione si
             * trovano qua anzichè in un file di configurazione separato
             */
            $host = 'localhost';
            $db   = 'ask';
            $user = 'ask_user';
            $pass = 'skattrone';
            $charset = 'utf8';

            $DSN = "mysql:host=$host;dbname=$db;charset=$charset";
            $user = $user;
            $password = $pass;
            $pdo = new PDO($DSN, $user, $password);
        }
        return $pdo;
    }

}