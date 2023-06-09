<?php
namespace App\models;

class listeModel extends model
{
    public function __construct()
    {
        $this->table = 'classe';
    }
    public function getEleveByIdClasse($id)
    {
        $sql = "SELECT inscription.* , classe.id AS Classe_ID FROM inscription JOIN classe ON inscription.classe = classe.nom WHERE classe.id = $id";
        return $this->myQuerry($sql);
    }
}