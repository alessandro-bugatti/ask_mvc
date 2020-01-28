<?php

namespace Util;

class Request {

    private $method;
    private $path;

    function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->path = $_SERVER['REQUEST_URI'];
    }

    function getMethod() {
        return $this->method;
    }

    function getPath() {
        return $this->path;
    }

}
