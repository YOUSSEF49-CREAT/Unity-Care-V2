<?php
class Database {
    public static function connect() {
        return new PDO(
            "mysql:host=localhost;dbname=hospital_management;charset=utf8",
            "root",
            "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
}
