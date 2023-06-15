<?php

namespace App\models;

class SemestreModel extends model
{
    protected $table;
    protected $id;
    protected $nom;
    protected $status;
    public function __construct()
    {
        $this->table = 'periode';
    }

    public function findCurrentSemester($classe_id)
    {
        $sql = "SELECT periode.nom FROM classe_semestre JOIN classe ON classe_semestre.classe_id = classe.id JOIN periode ON classe_semestre.semestre_id = periode.id WHERE classe.id = $classe_id";
        return $this->myQuerry($sql)->fetch();
    }
    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

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
