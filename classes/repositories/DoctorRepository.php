<?php

class DoctorRepository extends BaseRepository
{

    public function findAll() : array
    {
        $stmt = $this->pdo->query(
            "SELECT d.*, u.email, u.password
             FROM doctors d
             JOIN users u ON d.user_id = u.id"
        );

        $doctors = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $d = new Doctor( $row['email'], $row['password'], $row['first_name'],$row['last_name'], $row['specialization']);
            $d->setId($row['id']);
            $doctors[] = $d;
        }

        return $doctors;
    }
}