<?php

namespace App\Controllers;

use App\Models\disciplinemodel;
use PDO;

class disciplineController extends Controller
{
    protected $model;
    public function __construct()
    {
        $this->model = new disciplinemodel();
    }
    public function index()
    {
        $this->render('discipline.php');
    }

    public function ajout()
    {
        $this->render('matieres.php');
    }
    public function getDatas()
    {
        $datas = $this->model->findGroupeEtDiscipline();
        $this->json($datas);
    }
    public function delete()
    {
        $datas = json_decode(file_get_contents('php://input'));
        if (!empty($datas) && isset($datas->disciplines)) {
            if (is_array($datas->disciplines)) {
                foreach ($datas->disciplines as $discipline) {
                    $this->model->delete($discipline);
                }
                $this->json(['status' => 'success', 'message' => 'Tableau Disciplines supprimées avec succès', 'datas' =>$discipline]);
            } else {
                $this->model->deleteOnediscipline($datas->disciplines);
                $this->json(['status' => 'success', 'message' => 'Discipline supprime avec succes', 'datas' => $datas]);
            }
        } else {
            $this->json(['status' => 'error', 'message' => 'Aucune discipline supprimer']);
        }
    }


    public function add()
    {
        $datas = json_decode(file_get_contents('php://input'));
        $allDisciplines = $this->model->findAll();
        foreach ($allDisciplines as $discipline) {
            if ($discipline->discipline == $datas->discipline) {
                $this->json(['status' => 'error', 'message' => 'duplicate']);
                return;
            }
        }
        $this->model->ajoute($datas);
        $this->json(['status' => 'success', 'datas' => $datas]);
    }
}
