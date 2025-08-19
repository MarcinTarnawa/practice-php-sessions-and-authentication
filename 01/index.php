<?php
session_start();
require 'Validator.php';
require 'Database.php';
require 'Table.php';

$config = [
    'database' => [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'db',
        'charset' => 'utf8mb4'
    ]
];

// table name and columns
$table = 'products';
$columns = [ 'name' => 'Nazwa', 'price' => 'Cena'];
$sort = $_GET['sort'] ?? $_COOKIE['cookieSort'] ?? 'alf';

//set cookie for remember selected optoion
setcookie('cookieSort', $sort, time() + 60, "/");

//check for selected option
function isSelected($optionValue, $currentSort) {
    if ($optionValue === $currentSort) {
        return 'selected';
    }}

// connect with database
try 
    {
    $db = new Database($config['database']);
    $post = new Table($db, $table);
    $data = $post->render($columns, $sort);
    }
catch(PDOException $e)
    {
    die("Error: ".$e->getMessage());
    }

require 'index.view.php';