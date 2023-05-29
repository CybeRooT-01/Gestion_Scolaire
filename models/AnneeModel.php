<?php

namespace App\models;

class AnneeModel extends model
{
    protected $id;
    protected $annee_scolaire;
    protected $status;

    public function __construct()
    {
        $this->table = 'annee';
    }
    public function getActiveYear()
    {
        return $this->myQuerry('SELECT annee_scolaire FROM ' . $this->table . ' WHERE status = ?', ['active'])->fetchAll();
    }
    public function updateStatut(int $id, string $nouveauStatut)
    {
        return $this->myQuerry('UPDATE ' . $this->table . ' SET status = ? WHERE id = ?', [$nouveauStatut, $id]);
    }

    public function mettreLesAutreInactive(){
        return $this->myQuerry('UPDATE ' . $this->table . ' SET status = ?', ['inactive']);
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
     * Get the value of annee_scolaire
     */
    public function getAnneeScolaire()
    {
        return $this->annee_scolaire;
    }

    /**
     * Set the value of annee_scolaire
     */
    public function setAnneeScolaire($annee_scolaire): self
    {
        $this->annee_scolaire = $annee_scolaire;

        return $this;
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
}