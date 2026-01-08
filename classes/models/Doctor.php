<?php

class Doctor extends User
{
    private string $firstName;
    private string $lastName;
    private ?string $specialization;

    public function __construct(string $email,string $password,string $firstName,string $lastName,string $username,?string $specialization) 
    {
        parent::__construct($email, $password, 'doctor',$username);
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->specialization = $specialization;
    }

    public function getFirstName(): string 
    { 
        return $this->firstName;
     }
    public function getLastName(): string
     { 
        return $this->lastName;
     }
    public function getFullName(): string { 
        return 'Dr ' . $this->firstName . ' ' . $this->lastName;
     }
    public function getSpecialization(): ?string {
         return $this->specialization;
     }
    
    
}
