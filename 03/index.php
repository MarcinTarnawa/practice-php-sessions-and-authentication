<?php

use Core\Database;

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

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path($path);
}
session_start();
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

$email = $_COOKIE['login'] ?? $_POST['email'] ?? NULL;
$password = $_COOKIE['password'] ?? $_POST['password'] ?? NULL;

$errors = [];

try{
//database connection
    $db = new Database($config['database']);
    }
catch(PDOException $e)
    {
        die("Error: ".$e->getMessage());
    }

//chech for email
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->fetch();

if(isset($_COOKIE['password'])){
    echo 'login';
};

$userLog = $user['email'] ?? NULL;

if($user) {
   if(password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
                'email' => $user['email']
        ];
        session_regenerate_id(true);
        setcookie('login', $userLog, time() + 360, "/");
        setcookie('password', $password, time() + 360, "/");
        header('location: /controllers/login.php');
        exit();}
    else {
        $errors['email'][] = "Wrong email or password";
    }}
elseif($email && $password) {
    $errors['email'][] = "Wrong email or password";
} else {
    if(isset($email)) {
    $errors['email'][] = "Wrong email";
}
}

require 'views/index.view.php';