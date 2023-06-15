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
        $sql = "SELECT coef.id AS coef_id, discipline.*, classe.* FROM coef JOIN discipline ON coef.discipline_id = discipline.id JOIN classe ON coef.id_classe = classe.id WHERE classe.id = $idclasse";
        return $this->myQuerry($sql)->fetchAll();
    }
    public function findClassNameByClassId($classId)
    {
        $sql = "SELECT nom FROM classe WHERE id = $classId ";
        return $this->myQuerry($sql)->fetch();
    }
    public function findCoefIdByDisciplineId($disciplineId)
    {
        $sql = "SELECT id FROM coef WHERE discipline_id = $disciplineId";
        return $this->myQuerry($sql)->fetch();
    }
    public function delete(int $id)
    {
        $sql = "DELETE FROM $this->table WHERE id = $id";
        return $this->myQuerry($sql);
    }
    public function updateDiscipline(int $id, int $ressources, int $examens)
    {
        $sql = "UPDATE coef SET  ressource = $ressources,  Examen = $examens WHERE id = $id";
        return $this->myQuerry($sql);
    }
}

/*

*/