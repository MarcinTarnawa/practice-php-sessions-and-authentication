<?php

namespace Core\Middleware;

class Middleware
{
    public static array $log = [];

   public const MAP = [
    'log' => Log::class
   ];

   public static function resolve($key) 
   {
    if(!$key) {
        return;
    }
        $middleware = static::MAP[$key] ?? false;

        if(!$middleware){
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }
        (new $middleware)->handle();
   }
}