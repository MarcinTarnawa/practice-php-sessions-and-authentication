<?php
session_start();
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
$table = 'sort';
$columns = [ 'name' => 'Nazwa', 'price' => 'Cena'];
$sort = $_GET['sort'] ?? $_COOKIE['cookieSort'] ?? 'alf';

setcookie('cookieSort', $sort, time() + 60, "/");

function isSelected($optionValue, $currentSort) {
    if ($optionValue === $currentSort) {
        return 'selected';
    }}

// connect with database
try 
    {
    $db = new Database($config['database']);
    $posts = $db->select($table, $columns)->fetchAll();
    }
catch(PDOException $e)
    {
    die("Error: ".$e->getMessage());
    }

$post = new Table($db, $table);
$data = $post->render($columns, $sort);
// var_dump($data);

require 'index.view.php';