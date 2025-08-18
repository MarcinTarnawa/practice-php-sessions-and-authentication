<?php

namespace Core\Middleware;

class Log
{
    public static array $log = [];

    public static function handle()
    {
    $file = 'data';
    file_put_contents($file, "Route '" .$_SERVER['REQUEST_URI'] . "' IP '" . $_SERVER['REMOTE_ADDR'] . "' Time '" . date("h:i:sa") . "'" . PHP_EOL, FILE_APPEND );
    } 
}