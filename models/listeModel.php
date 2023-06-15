<?php

namespace App\models;

class listeModel extends model
{
    protected $pdo;
    public function __construct()
    {
        $this->table = 'classe';
    }
    public function getEleveByIdClasse($id)
    {
        $sql = "SELECT * FROM eleves JOIN inscription ON eleves.id = inscription.id_eleve JOIN annee ON inscription.id_annee = annee.id WHERE inscription.id_classe = $id";
        return $this->myQuerry($sql);
    }
    public function getClassById($id)
    {
        $sql = "SELECT * FROM classe WHERE id = $id";
        return $this->myQuerry($sql)->fetch();
    }
    public function getDisciplinesByClassName($className)
    {
        $sql = "SELECT discipline, discipline.id as discipline_id FROM coef JOIN discipline ON coef.discipline_id = discipline.id JOIN classe ON coef.id_classe = classe.id WHERE classe.nom LIKE '$className'";
        return $this->myQuerry($sql)->fetchAll();
    }
    public function getMaxNote()
    {
        $sql = "SELECT discipline.discipline, coef.Examen, coef.ressource, coef.discipline_id FROM discipline JOIN coef ON discipline.id = coef.discipline_id";
        return $this->myQuerry($sql)->fetchAll();
    }

    public function updateNote($disciplineID, $semestreID, $elevesID, $noteExam, $noteRessource)
    {
        if (is_array($elevesID) && is_array($noteExam) && is_array($noteRessource)) {
            $count = count($elevesID);
            if ($count === count($noteExam) && $count === count($noteRessource)) {
                for ($i = 0; $i < $count; $i++) {
                    $sql = "UPDATE note SET examen_note = {$noteExam[$i]}, ressource_note = {$noteRessource[$i]}, discipline_id = {$disciplineID}, semestre_id = {$semestreID} WHERE eleve_id = {$elevesID[$i]}";
                    $this->myQuerry($sql);
                }
            } else {
                return false;
            }
        } else {
            $sql = "UPDATE note SET examen_note = {$noteExam}, ressource_note = {$noteRessource}, discipline_id = {$disciplineID}, semestre_id = {$semestreID} WHERE eleve_id = {$elevesID}";
            $this->myQuerry($sql);
        }
    }
}
