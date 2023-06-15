<?php

namespace App\Controllers;

use App\models\EleveModel;

class EleveController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user'])) {
            $eleveModel = new EleveModel();
            $eleves = $eleveModel->findAll();
            $typeCycle = $eleveModel->selectType()->fetchAll();
            $this->render('eleves/Eleves.php', ['eleves' => $eleves, 'typeCycle' => $typeCycle]);
                if (isset($_POST['inscrire'])) {
                    $nom = $_POST['nomEleve'];
                    $prenom = $_POST['prenomEleve'];
                    $dateNaissance = $_POST['dateNaissanceEleve'];
                    $lieuNaissance = $_POST['LieuNaissanceEleve'];
                    $matricule = $_POST['matriculeEleve'];
                    $sexe = $_POST['sexEleve'];
                    $niveau = $_POST['niveauEleve'];
                    $classe = $_POST['classeEleve'];
                    $annee = $_POST['annee'];
                    $eleveModel->createEleve($nom, $prenom, $dateNaissance, $lieuNaissance, $matricule, $sexe, $niveau, $classe, $annee);


                        $this->redirect('/eleve');
                }
                if (isset($_POST['supprimer'])){
                    $id = (int)$_POST['eleve_id'];
                    $eleveModel->deleteIdNoteEleve($id);
                    $eleveModel->delete($id);
                    $this->redirect('/eleve');
                }
        } else {
            $this->redirect('/connexion');
        }
    }
}