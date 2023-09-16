<?php

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();



use app\controllers\AuthController;
use app\controllers\CategoryController;
use app\controllers\ContactController;
use app\base\Init;

$config = [
    'UserClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['db_dns'],
        'user' => $_ENV['db_user'],
        'password' => $_ENV['db_pass']
    ]
];



$init = new Init(dirname(__DIR__), $config);

$init->route->get('/',[ContactController::class, 'index']);

$init->route->get('/login', [AuthController::class, 'login']);
$init->route->get('/register', [AuthController::class, 'register']);

$init->route->post('/login', [AuthController::class, 'login']);
$init->route->post('/register', [AuthController::class, 'register']);
$init->route->get('/logout', [AuthController::class, 'logout']);

Init::isGuest() ?: $init->route->get('/profile', [AuthController::class, 'profile']);
Init::isGuest() ?: $init->route->get('/category', [CategoryController::class, 'index']);
////$init->route->post('/contact', function () {
//    return 'Handling submitted data';
//});

$init->BaseInit();

