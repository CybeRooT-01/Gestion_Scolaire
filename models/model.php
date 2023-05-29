<?php
namespace App\models;
use App\Core\db;

//ici on a une enorme classe qui aura un crud qui sera utilisé par d'autre fonctions

class model extends db
{
    //table de la db
    protected $table;

    //instance de db
    protected $db;
    // =====================La Partie delete==============
    public function delete(int $id){
        return $this->myQuerry('DELETE FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }
    // =====================recuperation d'une type de cycle==============
    public function selectType(){
        $sql = "SELECT * FROM typecycle";
        return $this->myQuerry($sql);
    }
    // =====================La Partie update==============
    public function update(int $id, model $model){
        $champs = [];
        $valeurs = [];
        foreach ($model as $champ => $valeur) {
            if ($champ !== 'db' && $champ != 'table' && $valeur != null) {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $id;
        $liste_champs = implode(', ', $champs);
        return $this->myQuerry('UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE id = ?', $valeurs);
    }
    // =====================La Partie Create==============
    public function create(model $model){
        $champs = [];
        $inter = [];
        $valeurs = [];
        foreach ($model as $champ => $valeur) {
            if ($champ != 'db' && $champ != 'table' && $valeur !== null) {
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }
        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);
        return $this->myQuerry('INSERT INTO ' . $this->table . ' (' . $liste_champs . ') VALUES (' . $liste_inter . ')', $valeurs);
    }

    //insertion par hydratation
    public function hydrate($donnes){
        foreach ($donnes as $key => $value) {
            $setter = 'set'.ucfirst($key); // met le premier caractere en majuscule (avantage de la convention de nommage des setters)
            if (method_exists($this, $setter)){ //verifie dans notre objet si on a une methode qui sappel setter
                $this->$setter($value);
            }
        }
        return $this;
    }

    //une methode qui permet juste de recuperer un element (le findBy peut renvoyer plusieur element vu q'il boucle)
    public function find(int $id){
        return $this->myQuerry("SELECT * FROM {$this->table} WHERE id = $id")->fetch();
    }

    //une methode qui permet de recuperer tout les enregistrement d'une table
    public function findAll()
    {
        $requete =$this->myQuerry('SELECT * FROM '. $this->table);
        return $requete->fetchAll();
    }

    // une methode qui permet de recuperer des enregistrement specifique d'une table
    public function findBy(array $critere)
    {
        $champs = [];
        $valeurs = [];
        foreach ($critere as $champ => $valeur) {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }
        $liste_champs = implode('=? AND ', $champs);
        
        return $this->myQuerry('SELECT * FROM ' . $this->table . ' WHERE ' . $liste_champs, $valeurs)->fetchAll();
    }

    public function myQuerry(string $sql, array $attributs = null )
    {
        //on recupere l'instance de db
        $this->db = db::getInstance();

        //on verifie si y'a des arrtributs
        if ($attributs !== null) {
            //on a une requete preparé
            $requete = $this->db->prepare($sql);
            $requete->execute($attributs);
            return $requete;
        } else {
            //on a une requete non preparé (requete simple quoi)
            return $this->db->query($sql);
        }
    }
}