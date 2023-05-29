<?php
namespace App\models;

class listeModel extends model
{
    public function __construct()
    {
        $this->table = 'classe';
    }
    public function getEleveByClasse($classe){
        $sql = "SELECT * FROM eleves WHERE classe = ?";
        return $this->myQuerry($sql, [$classe]);
    }
}