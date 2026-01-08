<?php

abstract class User
{
    protected ?int $id = null;
    protected string $email;
    protected string $password;
    protected string $role;
    protected string $username;

    public function __construct(string $email, string $password, string $role, string $username)
    {
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->username = $username;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function getUsername(): string
    {
        return $this->username;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getPassword(): string {
         return $this->password;
     }
}
