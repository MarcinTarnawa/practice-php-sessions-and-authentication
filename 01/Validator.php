<?php

class Validator
{
    //sanitize value
    public static function sanitize($value)
    {
        $selectedValue = array_keys($value);
        $sanitizedValue = array_map(function($col) {
           return preg_replace('/[^a-zA-Z0-9_]/', '', $col);
        }, $selectedValue);
        $value = implode(', ', $sanitizedValue);

        return $value;
    }
}