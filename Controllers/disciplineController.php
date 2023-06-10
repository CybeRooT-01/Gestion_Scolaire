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
    public function getDatas(){
        $datas = $this->model->findGroupeEtDiscipline();
        $this->json($datas);
    }
    public function delete(){
        $datas = json_decode(file_get_contents('php://input'));
        $this->model->delete($datas);
        $this->json(['status' => 'success', 'datas' => $datas]);
    }
    public function add() {
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