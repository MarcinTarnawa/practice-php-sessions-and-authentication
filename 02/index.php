<?php

use Core\Database;
use Core\Validator;
use Core\Table;

//autoloader 
const BASE_PATH = __DIR__.'/';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

function base_path($path)
{
    return BASE_PATH . $path;
}

$config = [
    'database' => [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'db',
        'charset' => 'utf8mb4'
    ]
];

//viarables
$tableName = 'users';
$name = $_POST['name'] ?? NULL;
$email = $_POST['email'] ?? NULL;
$password = $_POST['password'] ?? NULL;

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path($path);
}

try{
//database connection
    $db = new Database($config['database']);
    $controller = new Table($db, $tableName);
    }
catch(PDOException $e)
    {
        die("Error: ".$e->getMessage());
    }

//chech for email already exist
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->fetch();

if($user) {
    $errors['email'][] =  "Email already exists at db";
} else {
    if($_POST['name'] ?? NULL && $_POST['email'] ?? NULL && $_POST['password'] ?? NULL) {
        $rules = $controller->rules();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userData = [
                'name' => $name,
                'email' => $email,
                'passwordcheck' => $password,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];
        // $controller->addField($userData, $rules);
        $errors = $controller->addField($userData, $rules);
        }
}
require 'index.view.php';