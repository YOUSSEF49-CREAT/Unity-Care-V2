<?php

class DoctorRepository extends BaseRepository
{

        public function findAll(): array
        {
            $stmt = $this->pdo->query(
               "SELECT d.*, u.email, u.password, u.username
     FROM doctors d
     JOIN users u ON d.user_id = u.id"
            );

            $doctors = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $d = new Doctor($row['email'], $row['password'], $row['first_name'], $row['last_name'],$row['username'], $row['specialization']);
                $d->setId($row['id']);
                $doctors[] = $d;
            }

            return $doctors;
        }


    public function save(Doctor $d): void
    {

        $stmt = $this->pdo->prepare(
            "INSERT INTO users (email, password, role, username)
     VALUES (?, ?, 'doctor', ?)"
        );
        $stmt->execute([
            $d->getEmail(),
            password_hash($d->getPassword(), PASSWORD_DEFAULT),
            $d->getUsername()
        ]);

        $userId = $this->pdo->lastInsertId();


        $stmt = $this->pdo->prepare(
            "INSERT INTO doctors (user_id, first_name, last_name, specialization)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([
            $userId,
            $d->getFirstName(),
            $d->getLastName(),
            $d->getSpecialization()
        ]);
    }
}