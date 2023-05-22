<?php

namespace App\models;

class ClasseModel extends model
{
    protected $id;
    protected $nom;
    protected $niveau;
    protected $type_cycle;

    public function __construct()
    {
        $this->table = 'classe';
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
     * Get the value of niveau
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set the value of niveau
     */
    public function setNiveau($niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get the value of type_cycle
     */
    public function getTypeCycle()
    {
        return $this->type_cycle;
    }

    /**
     * Set the value of type_cycle
     */
    public function setTypeCycle($type_cycle): self
    {
        $this->type_cycle = $type_cycle;

        return $this;
    }
}