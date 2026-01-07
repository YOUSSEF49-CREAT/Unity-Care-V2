<?php 

class AuthController{
     public static function login(string $email, string $password) : bool
     {
        $pdo = Database::connect();
        $repo = new UserRepository($pdo);

        $user = $repo->findBayEmail($email);

        if(!$user) {
            return false ;
        }

        if(!password_verify($password , $user['password'])){
            return false ;
        }

        $_SESSION['user_id'] = $user['id'] ;
        $_SESSION['role'] = $user['role'] ;
        $_SESSION['emaile'] = $user['email'] ;

        return true ;
     }

     public static function logout(){

       

         $_SESSION = [];

         
        session_destroy();

        header('Location: index.php?page=login');
        exit;
     }




}