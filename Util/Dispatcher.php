<?php

namespace Util {
    /**
     * Class Dispatcher
     * Chiama i metodi registrati nel @link Router mandandoli in esecuzione
     * @package Util
     */

    class Dispatcher
    {

        private Router $router;

        /**
         * Dispatcher constructor.
         * @param Router $router L'oggetto creato nel file index, che contiene
         * tutte le route, ognuna con la callback che deve essere chiamata
         */
        function __construct(Router $router)
        {
            $this->router = $router;
        }

        /**
         * Manda in esecuzione la callback corretta in base al percorso
         * estratto dalla richiesta
         * @param Request $request La richiesta http che contiene l'URL richiesto dal client
         */
        function handle(Request $request)
        {
            $handler = $this->router->match($request);
            $handler();
        }

    }
}