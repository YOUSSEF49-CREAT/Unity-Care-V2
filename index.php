<?php
session_start();

require_once __DIR__ . '/config/Database.php';
require_once  'core/Session.php';
require_once  'core/Auth.php';
require_once 'controllers/AuthController.php';
require_once __DIR__ . '/controllers/DepartmentController.php';

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

    case 'departments':
        DepartmentController::index();
    break;

    case 'department-create':
        require 'views/departments/create.php';
        break;

    case 'department-store':
        DepartmentController::store($_POST);
        break;

    case 'department-delete':
        DepartmentController::delete($_GET['id']);
        break;


    default:
        echo "404";
}
