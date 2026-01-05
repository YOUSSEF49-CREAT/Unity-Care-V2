<?php

class DashboardController
{
    

    public static function appointmentsByStatus(): array
    {
        $pdo = Database::connect();
        $stmt = $pdo->query(
            "SELECT status, COUNT(*) as total
             FROM appointments
             GROUP BY status"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function appointmentsByDoctor(): array
    {
        $pdo = Database::connect();
        $stmt = $pdo->query(
            "SELECT d.first_name, d.last_name, COUNT(a.id) as total
             FROM appointments a
             JOIN doctors d ON a.doctor_id = d.id
             GROUP BY d.id"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function topMedications(): array
    {
        $pdo = Database::connect();
        $stmt = $pdo->query(
            "SELECT m.name, COUNT(p.id) as total
             FROM prescriptions p
             JOIN medications m ON p.medication_id = m.id
             GROUP BY m.id
             ORDER BY total DESC
             LIMIT 5"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    

    public static function data(): array
    {
        $role = $_SESSION['role'];

        if ($role === 'admin') {
            return [
                'status' => self::appointmentsByStatus(),
                'doctors' => self::appointmentsByDoctor(),
                'medications' => self::topMedications()
            ];
        }

        if ($role === 'doctor') {
            return [
                'status' => self::appointmentsByStatus()
            ];
        }

        
        return [];
    }
}
