<?php


namespace Util;

/**
 * Class Helper
 * Classe di dubbia utilità che contiene al suo interno parametri che si vogliono usare in altre
 * parti dell'applicazione, in modo che siano più OO rispetto a delle semplici variabili globali
 * @package Util
 */
class Helper
{
    static function root_path(): string
    {
        global $ROOT;
        return $ROOT;
    }
}

