<?php
session_start();

require_once __DIR__ . '/config/Database.php';
require_once  'core/Session.php';
require_once  'core/Auth.php';
require_once 'controllers/AuthController.php';

$page = $_GET['page'] ?? 'login';

if (Auth::check()) {
    $page = $_GET['page'] ?? 'dashboard';
}

switch ($page) {
    case 'login':
        require 'views/login.php';
        break;

    case 'login-post':
        AuthController::login($_POST);
        break;

    case 'dashboard':
        require 'views/dashboard.php';
        break;

    case 'logout':
        AuthController::logout();
        break;

    default:
        echo "404";
}
