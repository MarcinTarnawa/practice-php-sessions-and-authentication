<?php

if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    setcookie('login', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    setcookie('password', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    header('location: /');
    exit();
}

require '../views/login.view.php';