<?php

namespace Util {


    class Dispatcher
    {

        private Router $router;

        function __construct(Router $router)
        {
            $this->router = $router;
        }

        function handle(Request $request)
        {
            $handler = $this->router->match($request);
            $handler();
        }

    }
}