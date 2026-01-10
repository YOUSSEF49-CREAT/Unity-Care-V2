<?php
class DoctorController {

    public static function index() {
        $db = Database::connect();
        $stmt = $db->query("
            SELECT doctors.id, users.username, users.email,
                   departments.name AS department,
                   doctors.specialization, doctors.phone
            FROM doctors
            JOIN users ON doctors.user_id = users.id
            LEFT JOIN departments ON doctors.department_id = departments.id
            ORDER BY doctors.id DESC
        ");
        $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require 'views/doctors/index.php';
    }

    public static function create() {
        $db = Database::connect();
        $departments = $db->query("SELECT * FROM departments")->fetchAll(PDO::FETCH_ASSOC);
        require 'views/doctors/create.php';
    }

    public static function store($data) {
        $db = Database::connect();

        // 1. create user
        $stmt = $db->prepare("
            INSERT INTO users (email, username, password, role)
            VALUES (?, ?, ?, 'doctor')
        ");
        $stmt->execute([
            $data['email'],
            $data['username'],
            password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
        $user_id = $db->lastInsertId();

        // 2. create doctor
        $stmt = $db->prepare("
            INSERT INTO doctors (user_id, department_id, specialization, phone)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->execute([
            $user_id,
            $data['department_id'],
            $data['specialization'],
            $data['phone']
        ]);

        header("Location: index.php?page=doctors");
        exit;
    }

    public static function delete($id) {
        $db = Database::connect();
        // delete from users → cascade deletes doctor
        $stmt = $db->prepare("
            DELETE users FROM users
            JOIN doctors ON doctors.user_id = users.id
            WHERE doctors.id = ?
        ");
        $stmt->execute([$id]);

        header("Location: index.php?page=doctors");
        exit;
    }

    public static function show($id) {
        $db = Database::connect();
        $stmt = $db->prepare("
            SELECT users.username, users.email,
                   doctors.*, departments.name AS department
            FROM doctors
            JOIN users ON doctors.user_id = users.id
            LEFT JOIN departments ON doctors.department_id = departments.id
            WHERE doctors.id = ?
        ");
        $stmt->execute([$id]);
        $doctor = $stmt->fetch(PDO::FETCH_ASSOC);

        require 'views/doctors/show.php';
    }
}
