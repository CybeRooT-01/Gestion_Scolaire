<?php

namespace App\Controllers;

use App\models\AnneeModel;
use App\models\ClasseModel;
use App\models\EleveModel;

class EleveController extends Controller

{
    public function index()
    {
        $eleveModel = new EleveModel();
        $eleves = $eleveModel->EleveComplet();
        // recupere les années scolaires
        $anneeModel = new AnneeModel();
        $annees = $anneeModel->findAll();
        // recupere les classes
        $classeModel = new ClasseModel();
        $classes = $classeModel->findAll();

        $this->render('eleves/Eleves.php', ['eleves' => $eleves, 'annees' => $annees, 'classes' => $classes]);
        if (isset($_POST['nomEleve']) && isset($_POST['prenomEleve']) && isset($_POST['niveauEleve']) && isset($_POST['matriculeEleve']) && isset($_POST['classeEleve']) && isset($_POST['anneeEleve'])) {
            $nomEleve =  $_POST['nomEleve'];
            $prenomEleve =  $_POST['prenomEleve'];
            $niveauEleve = $_POST['niveauEleve'];
            $matriculeEleve = $_POST['matriculeEleve'];
            $classeEleve = (int)$_POST['classeEleve'];
            $anneeEleve = (int) $_POST['anneeEleve'];
            if ($nomEleve != '' && $prenomEleve != '' && $niveauEleve != '' && $matriculeEleve != '' && $classeEleve != '' && $anneeEleve != '') {
                $eleveModel->setNom($nomEleve);
                $eleveModel->setPrenom($prenomEleve);
                $eleveModel->setNiveau($niveauEleve);
                $eleveModel->setMatricule($matriculeEleve);
                $eleveModel->setClasseId($classeEleve);
                $eleveModel->setAnneeId($anneeEleve);
                $eleveModel->create($eleveModel);
                header('Location: /eleve');
            }
        }
        if (isset($_POST['supprimer'])){
            $id = (int)$_POST['eleve_id'];
            $eleveModel->delete($id);
            header('Location: /eleve');
            exit();
        }

        if(isset($_POST['modify'])){
            $id = (int)$_POST['modEleve_id'];
            $nomEleve =  $_POST['modNomEleve'];
            $prenomEleve =  $_POST['modPrenomEleve'];
            $niveauEleve = $_POST['modNiveauEleve'];
            $matriculeEleve = $_POST['modMatriculeEleve'];
            $classeEleve = (int)$_POST['modClasseEleve'];
            $anneeEleve = (int) $_POST['modAnneeEleve'];
            if ($nomEleve != '' && $prenomEleve != '' && $niveauEleve != '' && $matriculeEleve != '' && $classeEleve != '' && $anneeEleve != '') {
                $eleveModel->setNom($nomEleve);
                $eleveModel->setPrenom($prenomEleve);
                $eleveModel->setNiveau($niveauEleve);
                $eleveModel->setMatricule($matriculeEleve);
                $eleveModel->setClasseId($classeEleve);
                $eleveModel->setAnneeId($anneeEleve);
                $eleveModel->update($id, $eleveModel);
                header('Location: /eleve');
                exit();
            }
        }
    }
}
