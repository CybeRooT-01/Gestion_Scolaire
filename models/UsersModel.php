<?php
namespace App\Models;

class UsersModel extends model
{
    protected $id;
    protected $pass;
    protected $email;
    public function __construct()
    {
        $this->table = 'users';
    }
    public function findOnzByEmail(string $email){
        return $this->myQuerry("SELECT *  FROM {$this->table} WHERE email = ?", [$email])->fetch();
    }
    public function setSession(){
        $_SESSION['user'] = [
            'id' => $this->id,
            'email' => $this->email
        ];
    }

    /**
     * Get the value of pass
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     */
    public function setPass($pass): self
    {
        $this->pass = $pass;

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

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
}