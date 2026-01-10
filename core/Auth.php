<?php
class Auth {
    public static function attempt($login, $password) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$login, $login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            Session::set('user', ['id' => $user['id'],'username' => $user['username'],'role' => $user['role']]);
            return true;
        }
        return false;
    }

    public static function check() {
        return Session::get('user') !== null;
    }

    public static function logout() {
        Session::destroy();
    }
}
