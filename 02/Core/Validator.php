<?php

namespace Core;

class Validator {

    public static function stringMin($value, $min = 3)
    {
        return strlen($value) >= $min;
    }

    public static function stringMax($value, $max = INF)
    {
        return strlen($value) <= $max;
    }
     
    public static function numberMin($value, $min = 3)
    {
        return $value >= $min;
    }

    public static function numberMax($value, $max = INF)
    {
        return $value <= $max;
    }

    public static function number($value)
    {
        return is_numeric($value);
    }
     
    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}