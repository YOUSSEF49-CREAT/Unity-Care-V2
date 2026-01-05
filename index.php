<?php

require_once __DIR__ . '/config/Database.php';


require_once __DIR__ . '/classes/repositories/BaseRepository.php';
require_once __DIR__ . '/classes/repositories/UserRepository.php';


require_once __DIR__ . '/controllers/AuthController.php';

require_once __DIR__ . '/controllers/DashboardController.php';


$page = $_GET['page'] ?? (isset($_SESSION['user_id'])? 'dashboard' : 'login');

switch($page){
    case 'login' :
        require 'login.php' ;
        break ;

    case 'dashboard' :
    require 'views/dashboard/index.php' ;
        break ;
}