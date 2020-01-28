<?php

namespace Util {

    /**
     * Class Request
     * @package Util
     * Semplice classe che riceve i dati di una richiesta dal
     * server e li rende disponibile in modo più chiaro
     */
    class Request {
        private $method;
        private $path;
        private $get_parameters;
        private $post_parameters;

        /**
         * Request constructor
         * Recupera i dati dal server
         */
        function __construct() {
            $this->method = $_SERVER['REQUEST_METHOD'];
            $this->path = $_SERVER['REQUEST_URI'];
            $this->get_parameters = $_GET;
            $this->post_parameters = $_POST;
        }

        /**
         * @return string Una stringa che rappresenta un metodo (POST, GET, ...)
         */
        function getMethod() : string {
            return $this->method;
        }

        /**
         * @return string Ritorna il percorso della richiesta (ad esempio /post/list)
         */
        function getPath() : string{
            return $this->path;
        }

        /**
         * @return array
         */
        public function getGetParameters()
        {
            return $this->get_parameters;
        }

        /**
         * @return array
         */
        public function getPostParameters()
        {
            return $this->post_parameters;
        }

    }
}