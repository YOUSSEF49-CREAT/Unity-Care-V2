<?php
class AuthController {

    public static function login($data) {
        $login = $data['login'];
        $password = $data['password'];

        if (Auth::attempt($login, $password)) {
            header("Location: index.php?page=dashboard");
        } else {
            $_SESSION['error'] = "Login ou mot de passe incorrect";
            header("Location: index.php?page=login");
        }
        exit;
    }

    public static function logout() {
        Auth::logout();
        header("Location: index.php?page=login");
        exit;
    }
}
