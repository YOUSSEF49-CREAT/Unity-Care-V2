<?php

class DoctorController{

    public static function index(): array
    {
       $repo = new DoctorRepository(Database::connect()); 
       return $repo->findAll();
    }

    public static function store(array $data): void
    {
        

        $doctor = new Doctor($data['email'], $data['password'], $data['first_name'], $data['last_name'],$data['username'],$data['specialization'] ?? null );
    
        $repo = new DoctorRepository(Database::connect());
        $repo->save($doctor);

        header('Location: index.php?page=admin-doctors');
        exit;
    } 
}