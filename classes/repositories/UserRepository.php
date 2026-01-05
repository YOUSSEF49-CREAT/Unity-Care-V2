<?php

class UserRepository extends BaseRepository{
    
    public function findBayEmail(string $email) : ?array
    {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user ?: null ;
    }
}