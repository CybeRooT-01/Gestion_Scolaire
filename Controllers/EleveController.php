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
                    extract($_POST);
                    $classeEleve = $_POST['classeEleve'];
                    $anneeEleve = $_POST['annee'];
                        $data = [
                            'nom' => $nomEleve,
                            'prenom' => $prenomEleve,
                            'dateNaissance' => $dateNaissanceEleve,
                            'lieuNaissance' => $LieuNaissanceEleve,
                            'matricule' => $matriculeEleve,
                            'sexe' => $sexEleve,
                            'niveau' => $niveauEleve,
                            'classe' => $classeEleve,
                            'annee' => $anneeEleve,
                        ];
                        $eleveModel->hydrate($data);
                        $eleveModel->create($eleveModel);
                        $this->redirect('/eleve');
                }
                if (isset($_POST['supprimer'])){
                    $id = (int)$_POST['eleve_id'];
                    $eleveModel->delete($id);
                    $this->redirect('/eleve');
                }
        } else {
            $this->redirect('/connexion');
        }
    }
}