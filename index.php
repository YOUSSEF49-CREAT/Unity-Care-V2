<?php
session_start();

require_once __DIR__ . '/config/Database.php';
require_once  'core/Session.php';
require_once  'core/Auth.php';
require_once  'controllers/AuthController.php';
require_once __DIR__ . '/controllers/DepartmentController.php';
require_once __DIR__ . '/controllers/DoctorController.php';
require_once __DIR__ . '/controllers/PatientController.php';
require_once __DIR__ . '/controllers/AppointmentController.php';

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

    case 'doctors':
        DoctorController::index();
    break;

    case 'doctor-create':
        DoctorController::create();
        break;

    case 'doctor-store':
        DoctorController::store($_POST);
        break;

    case 'doctor-delete':
        DoctorController::delete($_GET['id']);
        break;

    case 'doctor-show':
        DoctorController::show($_GET['id']);
        break;

    case 'Patients':
    PatientController::index();
    break;

    case 'patient-create':
        PatientController::create();
        break;

    case 'patient-store':
        PatientController::store($_POST);
        break;

    case 'patient-delete':
        PatientController::delete($_GET['id']);
        break;

    case 'patient-show':
        PatientController::show($_GET['id']);
        break;

    case 'appointments':
        AppointmentController::index();
    break;

    case 'appointment-create':
        AppointmentController::create();
        break;

    case 'appointment-store':
        AppointmentController::store($_POST);
        break;

    case 'appointment-delete':
        AppointmentController::delete($_GET['id']);
        break;

    case 'appointment-done':
        AppointmentController::markDone($_GET['id']);
        break;


    default:
        echo "404";
}
