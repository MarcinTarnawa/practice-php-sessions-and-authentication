<?php 

$router->get('/', 'views/index.view.php')->log('log');
$router->get('/about', 'controllers/about.php')->log('log');
$router->get('/contact', 'controllers/contact.php')->log('log');
$router->get('/log', 'controllers/log.php')->log('log');