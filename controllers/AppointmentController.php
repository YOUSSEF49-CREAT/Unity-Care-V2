<?php

class AppointmentController {

    public static function index() {
        $db = Database::connect();

        $stmt = $db->query("
            SELECT appointments.id,
                   appointments.appointment_date,
                   appointments.appointment_time,
                   appointments.status,
                   pusers.username AS patient_name,
                   dusers.username AS doctor_name
            FROM appointments
            JOIN patients ON appointments.patient_id = patients.id
            JOIN users pusers ON patients.user_id = pusers.id
            JOIN doctors ON appointments.doctor_id = doctors.id
            JOIN users dusers ON doctors.user_id = dusers.id
            ORDER BY appointments.appointment_date DESC
        ");

        $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require 'views/appointments/index.php';
    }

    public static function create() {
        $db = Database::connect();

        // get doctors
        $doctors = $db->query("
            SELECT doctors.id, users.username 
            FROM doctors
            JOIN users ON doctors.user_id = users.id
        ")->fetchAll(PDO::FETCH_ASSOC);

        // get patients
        $patients = $db->query("
            SELECT patients.id, users.username 
            FROM patients
            JOIN users ON patients.user_id = users.id
        ")->fetchAll(PDO::FETCH_ASSOC);

        require 'views/appointments/create.php';
    }

    public static function store($data) {
        $db = Database::connect();

        $stmt = $db->prepare("
            INSERT INTO appointments 
            (doctor_id, patient_id, appointment_date, appointment_time, reason)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['doctor_id'],
            $data['patient_id'],
            $data['appointment_date'],
            $data['appointment_time'],
            $data['reason']
        ]);

        header("Location: index.php?page=appointments");
        exit;
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM appointments WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: index.php?page=appointments");
        exit;
    }

    public static function markDone($id) {
        $db = Database::connect();
        $stmt = $db->prepare("
            UPDATE appointments SET status = 'done' WHERE id = ?
        ");
        $stmt->execute([$id]);

        header("Location: index.php?page=appointments");
        exit;
    }
}
