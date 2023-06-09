<?php
namespace App\Controllers;

use App\models\listeModel;
use App\models\AnneeModel;
class listeController extends Controller
{
    protected $annee;
    protected $active;
    public function __construct()
    {
        $this->annee = new AnneeModel();
        $this->active = $this->annee->getActiveYear();

    }
    public function index()
    {
        if(isset($_SESSION['user'])){
            $nom = $_SERVER['REQUEST_URI'];
            $nom = explode('/', $nom);
            $idclasse =(int)$nom[3];
            $model = new listeModel();
            $eleves = $model->getEleveByIdClasse($idclasse);
            $this->render('cycles/listeEleve.php', ['eleve' => $eleves, 'active' => $this->active]);
        }else{
            $this->redirect('/connexion');
        }
    }
}