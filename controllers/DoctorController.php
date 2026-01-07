<?php

class DoctorController{

    public static function index(): array
    {
       $repo = new DoctorRepository(Database::connect()); 
       return $repo->findAll();
    }
}