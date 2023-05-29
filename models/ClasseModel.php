<?php

namespace App\models;

class ClasseModel extends model
{
    protected $id;
    protected $nom;
    protected $niveau;
    protected $idTypeCyble;

    public function __construct()
    {
        $this->table = 'classe';
    }
    public function addClasse(){
        $sql = "INSERT INTO classe (nom, niveau, idTypeCycle) VALUES (?, ?, ?)";
        return $this->myQuerry($sql, [$this->nom, $this->niveau, $this->idTypeCyble]);
    }

    public function classeComplet(){
        $sql = "SELECT classe.*, typecycle.nom AS nom_typecycle
        FROM classe
        JOIN typecycle ON classe.idTypeCycle = typecycle.id";
        return $this->myQuerry($sql);
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
     * Get the value of idTypeCyble
     */
    public function getIdTypeCyble()
    {
        return $this->idTypeCyble;
    }

    /**
     * Set the value of idTypeCyble
     */
    public function setIdTypeCyble($idTypeCyble): self
    {
        $this->idTypeCyble = $idTypeCyble;

        return $this;
    }
}