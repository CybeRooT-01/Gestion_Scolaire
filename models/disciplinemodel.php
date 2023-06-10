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
        @$disciplines = $datas->discipline;
        $sql = "INSERT INTO $this->table (discipline, classe_id, groupe_discipline, code)
                  VALUES ('$disciplines', (SELECT id FROM classe WHERE nom = '$nom'), '$groupe_discipline', '$code')";
        $this->myQuerry($sql);
    }
    private function escapeString($value)
    {
        $escapedValue = addslashes($value);
        $escapedValue = str_replace('"', '\"', $escapedValue);
        return $escapedValue;
    }
    public function findGroupeEtDiscipline()
    {
        $sql = "SELECT nom, groupe_discipline, discipline,code FROM classe JOIN discipline ON classe.id = discipline.classe_id";
        return $this->myQuerry($sql)->fetchAll();
    }
    public function delete($datas)
    {
        $sql = "DELETE FROM $this->table WHERE classe_id = (SELECT id FROM classe WHERE nom = '$datas->nom')AND discipline IN ('" . implode("','", $datas->disciplines) . "')";
        $this->myQuerry($sql);
    }

    public function findClassIdByClassename($classeName)
    {
        $sql = "SELECT id FROM classe WHERE nom = '$classeName'";
        return $this->myQuerry($sql)->fetch();
    }
}
