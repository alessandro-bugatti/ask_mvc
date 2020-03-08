<?php

namespace Util;

/**
 * Class StringUtil
 * This class provides some functions used to manage strings into template pages
 * without writing logic code in it.
 * @package Util
 */
class StringUtil {
    private function __construct(){}

    /**
     * @param string $str the input string
     * @param int $length max length of the string
     * @param string $appendStr a string containing chars to append to the substring (like "...")
     * 
     * @return string a string containing the input string if the specified length is equal to the given length, 
     *                a substring with $appendStr appended if the specified length is less than the original string length 
     */
    public static function substr_and_append(string $str, int $length, string $appendStr) : string {
        if(strlen($str) <= $length)
            return $str;
        return substr($str, 0, $length) . $appendStr;
    }

}