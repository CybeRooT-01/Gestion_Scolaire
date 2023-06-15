<?php
namespace App\Controllers;

use App\models\listeModel;
use App\models\AnneeModel;
use App\models\SemestreModel;
class listeController extends Controller
{
    protected $annee;
    protected $active;
    protected $semestreModel;
    protected $listeModel;
    public function __construct()
    {
        $this->annee = new AnneeModel();
        $this->active = $this->annee->getActiveYear();
        $this->listeModel = new listeModel();
    }
    public function index()
    {
        if(isset($_SESSION['user'])){
            $nom = $_SERVER['REQUEST_URI'];
            $nom = explode('/', $nom);
            $idclasse =(int)$nom[3];
            $model = new listeModel();
            $Semester = new SemestreModel();
            $eleves = $model->getEleveByIdClasse($idclasse)->fetchAll();
            // var_dump($eleves);
            $effectif = sizeof($eleves);
            $classe = $model->getClassById($idclasse);
            // var_dump($classe);
            $Semester = $Semester->findCurrentSemester($idclasse);
            $disciplines = $model->getDisciplinesByClassName($classe->nom);
            // echo "<pre>";
            // var_dump($disciplines);
            // echo "</pre>";
            $activeSemesterName = $Semester->nom;
            // $activeSemesterId = $Semester->id;
            $this->render('cycles/listeEleve.php', [
                'eleve' => $eleves,
                'active' => $this->active,
                'classe' => $classe,
                'id' => $idclasse,
                'cycleID' => $classe->idTypeCycle,
                'disciplines' => $disciplines,
                'effectif' => $effectif,
                'activeSemester' => $activeSemesterName,
                // 'activeSemesterId' => $activeSemesterId
            ]);
        }else{
            $this->redirect('/connexion');
        }
    }
    public function maxNote(){
        $datas = $this->listeModel->getMaxNote();
        $this->json($datas);
    }
    public function ajout(){
        $datas = json_decode(file_get_contents('php://input'));
        // $disciplineID =  $datas->idDiscipline;
        // $semestreID = $datas->semestre;
        // $elevesID  = $datas->idEleve;
        // $noteExam = $datas->noteExamen;
        // $noteRessource = $datas->noteRessource;
        // $this->listeModel->updateNote($disciplineID, $semestreID, $elevesID, $noteExam, $noteRessource);
        $this->json(['status' => 'success', 'datas' => $datas]);
    }
}