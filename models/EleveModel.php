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
    protected $dateNaissance;
    protected $lieuNaissance;
    protected $sexe;
    protected $annee;

    public function __construct()
    {
        $this->table = 'inscription';
    }

    // public function EleveComplet()
    // {
    //     $sql = "SELECT eleves.id, eleves.nom, eleves.prenom, eleves.matricule, classe.nom as classe, classe.niveau, annee.annee_scolaire
    //     FROM eleves
    //     INNER JOIN classe ON eleves.classe_id = classe.id
    //     INNER JOIN annee ON eleves.annee_id = annee.id";
    //     return $this->myQuerry($sql);
    // }

    /**
     * Get the value of lieuNaissance
     * 'nom' => $nomEleve,
                           
     */
    public function createEleve($nomEleve, $prenomEleve, $dateNaissanceEleve, $lieuNaissanceEleve, $matriculeEleve, $sexEleve, $niveauEleve, $classeEleve, $anneeEleve) {
        $sql = "INSERT INTO inscription(nom, prenom, niveau, matricule, lieuNaissance, dateNaissance, classe, sexe, annee) VALUES ('$nomEleve', '$prenomEleve', '$niveauEleve', '$matriculeEleve', '$lieuNaissanceEleve', '$dateNaissanceEleve', '$classeEleve', '$sexEleve', '$anneeEleve')";
        $this->myQuerry($sql);
        $eleveID = $this->db->lastInsertId();
        $sql2 = "INSERT INTO note (eleve_id) VALUES ('$eleveID')";
        $this->myQuerry($sql2);
    }
    
    public function getLieuNaissance()
    {
        return $this->lieuNaissance;
    }
    public function deleteIdNoteEleve($id)
    {
        $sql = "DELETE FROM note WHERE eleve_id = $id";
        $this->myQuerry($sql);
    }
    /**
     * Set the value of lieuNaissance
     */
    public function setLieuNaissance($lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    /**
     * Get the value of sexe
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     */
    public function setSexe($sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get the value of dateNaissance
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     */
    public function setDateNaissance($dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get the value of matricule
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     */
    public function setMatricule($matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get the value of classe
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set the value of classe
     */
    public function setClasse($classe): self
    {
        $this->classe = $classe;

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
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;

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

    /**
     * Get the value of annee
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of annee
     */
    public function setAnnee($annee): self
    {
        $this->annee = $annee;

        return $this;
    }
}