<?php
namespace App\models;

class disciplineModel extends Model
{
    public function __construct()
    {
        $this->table = 'discipline';
    }
    public function ajoute($classeId, $nomDiscipline, $groupe, $code){
        $sql = "INSERT INTO $this->table (discipline, groupe_discipline, classe_id, code) VALUES ('$nomDiscipline', '$groupe', '$classeId', '$code')";
        $this->myQuerry($sql);
    }
    public function findGroupeEtDiscipline(){
        $sql = "SELECT nom, groupe_discipline, discipline,code FROM classe JOIN discipline ON classe.id = discipline.classe_id";
        return $this->myQuerry($sql)->fetchAll();
    }
    public function delete($datas){
        $sql = "DELETE FROM $this->table WHERE classe_id = (SELECT id FROM classe WHERE nom = '$datas->nom') AND groupe_discipline = '$datas->groupe_discipline' AND discipline IN (";
        foreach($datas->disciplines as $discipline){
            $sql .= "'$discipline',";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ")";
        $this->myQuerry($sql);
    }
    
    
}