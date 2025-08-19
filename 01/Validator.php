<?php

class Validator
{
    //sanitize columns
    public static function sanitize($columns)
    {
        $selectedColumns = array_keys($columns);
        $sanitizedColumns = array_map(function($col) {
           return preg_replace('/[^a-zA-Z0-9_]/', '', $col);
        }, $selectedColumns);
        $columns = implode(', ', $sanitizedColumns);

        return $columns;
    }
}