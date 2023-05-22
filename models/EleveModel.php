<?php

namespace App\models;

class EleveModel extends model
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $niveau;
    protected $classe;
    protected $matricule;
    protected $annee_id;
    protected $classe_id;

    public function __construct()
    {
        $this->table = 'eleves';
    }

    public function EleveComplet()
    {
        $sql = "SELECT eleves.id, eleves.nom, eleves.prenom, eleves.matricule, classe.nom as classe, classe.niveau, annee.debut_annee_scolaire, annee.fin_annee_scolaire
        FROM eleves
        INNER JOIN classe ON eleves.classe_id = classe.id
        INNER JOIN annee ON eleves.annee_id = annee.id;";
        return $this->myQuerry($sql);
    }
    
    public function getClasseId()
    {
        return $this->classe_id;
    }
    public function setClasseId($classe_id): self
    {
        $this->classe_id = $classe_id;

        return $this;
    }

    public function getAnneeId()
    {
        return $this->annee_id;
    }
    
    public function setAnneeId($annee_id): self
    {
        $this->annee_id = $annee_id;

        return $this;
    }

    public function getMatricule()
    {
        return $this->matricule;
    }


    public function setMatricule($matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    
    public function getClasse()
    {
        return $this->classe;
    }

    
    public function setClasse($classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    
    public function getNiveau()
    {
        return $this->niveau;
    }

    
    public function setNiveau($niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    
    public function getPrenom()
    {
        return $this->prenom;
    }

    
    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
}