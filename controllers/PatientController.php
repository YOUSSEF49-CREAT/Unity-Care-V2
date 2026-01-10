<?php

class PatientController {

    // List patients
    public static function index() {
        $db = Database::connect();

        $stmt = $db->query("
            SELECT patients.id,
                   users.username,
                   users.email,
                   patients.date_of_birth,
                   patients.phone,
                   dusers.username AS doctor_name
            FROM patients
            JOIN users ON patients.user_id = users.id
            LEFT JOIN doctors ON patients.doctor_id = doctors.id
            LEFT JOIN users dusers ON doctors.user_id = dusers.id
            ORDER BY patients.id DESC
        ");

        $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require 'views/patients/index.php';
    }

    // Show create form
    public static function create() {
        $db = Database::connect();

        // Get doctors for select list
        $stmt = $db->query("
            SELECT doctors.id, users.username
            FROM doctors
            JOIN users ON doctors.user_id = users.id
        ");
        $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require 'views/patients/create.php';
    }

    // Store patient
    public static function store($data) {
        $db = Database::connect();

        // 1. Create user
        $stmt = $db->prepare("
            INSERT INTO users (email, username, password, role)
            VALUES (?, ?, ?, 'patient')
        ");
        $stmt->execute([
            $data['email'],
            $data['username'],
            password_hash($data['password'], PASSWORD_DEFAULT)
        ]);

        $user_id = $db->lastInsertId();

        // 2. Create patient
        $stmt = $db->prepare("
            INSERT INTO patients (user_id, doctor_id, date_of_birth, phone, address, medical_history)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $user_id,
            $data['doctor_id'],
            $data['date_of_birth'],
            $data['phone'],
            $data['address'],
            $data['medical_history']
        ]);

        header("Location: index.php?page=Patients");
        exit;
    }

    // Delete patient
    public static function delete($id) {
        $db = Database::connect();

        // Delete user, patient will be deleted by cascade
        $stmt = $db->prepare("
            DELETE users FROM users
            JOIN patients ON patients.user_id = users.id
            WHERE patients.id = ?
        ");
        $stmt->execute([$id]);

        header("Location: index.php?page=Patients");
        exit;
    }

    // Show patient fiche
    public static function show($id) {
        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT users.username,
                   users.email,
                   patients.*,
                   dusers.username AS doctor_name
            FROM patients
            JOIN users ON patients.user_id = users.id
            LEFT JOIN doctors ON patients.doctor_id = doctors.id
            LEFT JOIN users dusers ON doctors.user_id = dusers.id
            WHERE patients.id = ?
        ");
        $stmt->execute([$id]);

        $patient = $stmt->fetch(PDO::FETCH_ASSOC);

        require 'views/patients/show.php';
    }
}
