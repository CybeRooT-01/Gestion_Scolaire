<?php
namespace App\Controllers;
use App\Models\disciplinemodel;

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
        if (isset($_POST['ajouter'])) {
            $id_classe = (int)$_POST['classe'];
            $nom = $_POST['discipline'];
            $groupe = $_POST['groupe'];
            $code = $_POST['code'];
            $this->model->ajoute($id_classe, $nom, $groupe, $code);
            echo "Ajouté avec succès";
            header('Location: /discipline/ajout');
        }
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
}