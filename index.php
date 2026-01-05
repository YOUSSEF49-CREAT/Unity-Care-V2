<?php
require_once __DIR__ . '/config/Database.php';

$page = $_GET['page'] ?? (isset($_SESSION['user_id'])? 'dashboard' : 'login');

switch($page){
    case 'login' :
        require 'login.php' ;
        break ;

    case 'dashboard' :
    require 'login.php' ;
        break ;
}