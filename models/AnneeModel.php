<?php

namespace App\models;

class AnneeModel extends model
{
    protected $id;
    protected $debut_annee_scolaire;
    protected $fin_annee_scolaire;

    public function __construct()
    {
        $this->table = 'annee';
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
     * Get the value of debut_annee_scolaire
     */
    public function getDebutAnneeScolaire()
    {
        return $this->debut_annee_scolaire;
    }

    /**
     * Set the value of debut_annee_scolaire
     */
    public function setDebutAnneeScolaire($debut_annee_scolaire): self
    {
        $this->debut_annee_scolaire = $debut_annee_scolaire;

        return $this;
    }

    /**
     * Get the value of fin_annee_scolaire
     */
    public function getFinAnneeScolaire()
    {
        return $this->fin_annee_scolaire;
    }

    /**
     * Set the value of fin_annee_scolaire
     */
    public function setFinAnneeScolaire($fin_annee_scolaire): self
    {
        $this->fin_annee_scolaire = $fin_annee_scolaire;

        return $this;
    }
}