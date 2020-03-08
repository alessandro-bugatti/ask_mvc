<?php

namespace Util {

    /**
     * Class Request
     * @package Util
     * Semplice classe che riceve i dati di una richiesta dal
     * server e li rende disponibili in modo più chiaro
     */
    class Request {
        private string $method;
        private string $path;
        private array $get_parameters;
        private array $post_parameters;
        private string $root_dir;

        /**
         * Request constructor
         * Recupera i dati dal server
         * @param string $root_dir
         */
        function __construct(string $root_dir) {
            $this->method = $_SERVER['REQUEST_METHOD'];
            $this->path = $_SERVER['REQUEST_URI'];
            $this->get_parameters = $_GET;
            $this->post_parameters = $_POST;
            $this->root_dir = $root_dir;
        }

        /**
         * @return string Una stringa che rappresenta un metodo (POST, GET, ...)
         */
        function getMethod() : string {
            return $this->method;
        }

        /**
         * @return string Ritorna il percorso della richiesta (ad esempio question/list)
         */
        function getPath() : string{
            //Questa parte serve per eliminare un'eventuale sottocartella all'inizio del percorso
            $len = strlen($this->root_dir) + 1;
            //Quest parte serve ad eliminare gli eventuali parametri GET
            if (strpos($this->path,'?') !== false)
                $pos = strpos($this->path,'?') - $len;
            else
                $pos = strlen($this->path);
            return substr($this->path, strlen($this->root_dir) + 1, $pos);
        }

        /**
         * Ritorna l'array dei parametri GET
         * @return array L'array dei parametri get, sostanzialmente $_GET
         */
        public function getGetParameters() : ?array
        {
            return empty($this->get_parameters)?null:$this->get_parameters;
        }

        /**
         * Ritorna l'array dei parametri POST
         * @return array L'array dei parametri post, sostanzialmente $_POST
         */
        public function getPostParameters() : ?array
        {
            return empty($this->post_parameters)?null:$this->post_parameters;
        }

        /**
         * Ritorna vero se ci sono parametri get, falso altrimenti
         * @return bool
         */
        public function hasGetParams() : bool
        {
            return !empty($this->get_parameters);
        }

        /**
         * Ritorna vero se ci sono parametri post, falso altrimenti
         * @return bool
         */
        public function hasPostParams() : bool
        {
            return !empty($this->post_parameters);
        }

    }
}
