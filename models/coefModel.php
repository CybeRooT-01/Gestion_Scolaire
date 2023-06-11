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
        $sql = "SELECT *, classe.id AS classe_id, discipline.id AS id_discipline, coef.id AS coef_id FROM discipline JOIN classe ON discipline.classe_id = classe.id JOIN coef ON discipline.id = coef.discipline_id WHERE classe.id = $idclasse";
        return $this->myQuerry($sql)->fetchAll();
    }
    public function findClassNameByClassId($classId){
        $sql = "SELECT nom FROM classe WHERE id = $classId ";
        return $this->myQuerry($sql)->fetch();
    }
    public function findCoefIdByDisciplineId($disciplineId){
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
