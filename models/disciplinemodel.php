<?php

namespace App\models;

class disciplineModel extends Model
{
    public function __construct()
    {
        $this->table = 'discipline';
    }
    public function ajoute($datas)
    {
        @$nom = $this->escapeString($datas->nom);
        @$groupe_discipline = $this->escapeString($datas->groupe_discipline);
        @$code = $this->escapeString($datas->code);
        @$discipline = $this->escapeString($datas->discipline);
        $sql = "INSERT INTO $this->table (discipline, groupe_discipline, code)
                  VALUES ('$discipline', '$groupe_discipline', '$code')";
        $sql2 = "INSERT INTO coef (discipline_id, id_classe) VALUES (LAST_INSERT_ID(), (SELECT id FROM classe WHERE nom = '$nom'))";
        $this->myQuerry($sql);
        $this->myQuerry($sql2);
    }
    private function escapeString($value)
    {
        $escapedValue = addslashes($value);
        $escapedValue = str_replace('"', '\"', $escapedValue);
        return $escapedValue;
    }
    public function findGroupeEtDiscipline()
    {
        // $sql = "SELECT nom, groupe_discipline, discipline,code FROM classe JOIN discipline ON classe.id = discipline.classe_id";
        $sql = "SELECT nom, groupe_discipline, discipline,code  FROM discipline JOIN coef on coef.discipline_id = discipline.id JOIN classe ON coef.id_classe = classe.id";
        return $this->myQuerry($sql)->fetchAll();
    }
    public function delete($data)
    {
        $sql = "DELETE FROM $this->table WHERE discipline = '$data->discipline'";
        $sql2 = "DELETE FROM coef WHERE discipline_id = (SELECT id FROM discipline WHERE discipline = '$data->discipline')";
        $this->myQuerry($sql);
        $this->myQuerry($sql2);
    }
    
    public function deleteOnediscipline($nom){
        $sql = "DELETE FROM $this->table WHERE discipline = '$nom'";
        $sql2 = "DELETE FROM coef WHERE discipline_id = (SELECT id FROM discipline WHERE discipline = '$nom')";
        $this->myQuerry($sql);
        $this->myQuerry($sql2);
    }

    public function findClassIdByClassename($classeName)
    {
        $sql = "SELECT id FROM classe WHERE nom = '$classeName'";
        return $this->myQuerry($sql)->fetch();
    }
    public function ajouterNote($disciplineID, $semestreID,  $ressourceID, $examID, $eleveID){
        $sql = "INSERT INTO note (discipline_id, semestre_id, ressource_id, examen_id, eleve_id) VALUES ($disciplineID, $semestreID, $ressourceID, $examID, $eleveID)";
        $this->myQuerry($sql);
    }
}
