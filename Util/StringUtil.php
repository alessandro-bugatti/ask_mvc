<?php

namespace Util;

/**
 * Class StringUtil
 * Questa classe fornisce funzioni usate per gestire stringhe nelle pagine di template
 * senza scrivere codice di logica in esse.
 * @package Util
 */
class StringUtil {
    private function __construct(){}

    /**
     * @param string $str la stringa di input
     * @param int $length la lunghezza massima della stringa
     * @param string $appendStr una stringa che contiene caratteri da concatenare alla sottostringa (ad esempio "...")
     * 
     * @return string una stringa che contiene la stringa di input se la lunghezza specificata è uguale alla lunghezza della stringa, 
     *                una sottostringa con $appendStr concatenato se la luhghezza specificata è minore di quella della stringa originale. 
     */
    public static function substr_and_append(string $str, int $length, string $appendStr) : string {
        if(strlen($str) <= $length)
            return $str;
        return substr($str, 0, $length) . $appendStr;
    }

}