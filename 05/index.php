<?php

session_start();

$text = $_GET['text'] ?? NULL;

if($text === NULL) {
    require 'index.view.php';
    }
else{
    // setcookie('text', $text, time() + 360, "/");
    require 'show.view.php';
}