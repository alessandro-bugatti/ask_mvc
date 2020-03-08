<?php


namespace Util;

use PDO;

/**
 * Class Connection
 * Rappresenta la connessione al database, è implementata come Singleton
 * e viene richiamata tipicamente dentro i model per spostare i dati da e verso il DB
 * @package Util
 */
class Connection
{
    private static PDO $pdo;

    /**
     * Connection constructor. Impedisce la creazione di oggetti Connection
     */
    private function __construct()
    {

    }

    /**
     * Restituisce l'oggetto PDO su cui lavoreranno i model. Allo stato attuale
     * contiene anche tutti i parametri di connessione, per semplificare la scrittura
     * @return PDO
     */
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
            $pdo = new PDO($DSN, $user, $pass);
        }
        return $pdo;
    }

}