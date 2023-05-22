<?php

namespace App\models;

class ConnexionModel extends model
{
    protected $email;
    protected $passwd;
    
    public function __construct()
    {
        $this->table = 'users';
    }
    
    /**
     * Get the value of passwd
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * Set the value of passwd
     */
    public function setPasswd($passwd): self
    {
        $this->passwd = $passwd;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }
}