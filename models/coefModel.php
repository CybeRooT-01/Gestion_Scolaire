<?php

namespace App\models;

class CoefModel extends model
{
    protected $table;

    public function __construct()
    {
        $this->table = 'discipline';
    }
    public function getDisciplineByIdClasse($idclasse)
    {
        $sql = "SELECT * FROM discipline JOIN classe ON discipline.classe_id = classe.id WHERE classe.id = $idclasse";
        return $this->myQuerry($sql)->fetchAll();
    }
    public function findClassNameByClassId($classId){
        $sql = "SELECT nom FROM classe WHERE id = $classId ";
        return $this->myQuerry($sql)->fetch();
    }
}
