<?php

namespace App\Controllers;

use App\models\ClasseModel;
use App\models\AnneeModel;
class ClasseController extends Controller
{
    public function index()
    {
        if ((isset($_SESSION['user']))) {
            $classeModel = new ClasseModel();
            $anneeModel = new AnneeModel();
            $annes = $anneeModel->getAllYear();
            $classes = $classeModel->classeComplet();
            $typeCycle = $classeModel->selectType()->fetchAll();
            $this->render('classe/classes.php', ['classes' => $classes, 'typeCycle' => $typeCycle, 'annes' => $annes]);
            if (!empty($_POST['nom']) && !empty($_POST['niveau']) && !empty($_POST['typeCycle'])) {
                $classeModel->setNom($_POST['nom']);
                $classeModel->setNiveau($_POST['niveau']);
                $classeModel->setIdTypeCyble($_POST['typeCycle']);
                $classeModel->setAnee($_POST['annee']);
                $classeModel->addClasse();
                $this->redirect('/niveau');
            }

            if (!empty($_POST['idClasse'])) {
                $classeModel->delete((int)$_POST['idClasse']);
                $this->redirect('/niveau');
            }

            if (!empty($_POST['modify'])) {
                $datas = [
                    'nom' => $_POST['Modnom'],
                    'niveau' => $_POST['Modniveau'],
                    'Typecycle' => $_POST['Modcycle']
                ];
                $classeModel->hydrate($datas);
                $classeModel->update($_POST['idModify'], $classeModel);
                $this->redirect('/classe');
            }
        } else {
            $this->redirect('/connexion');
        }
    }
    public function getTypeCycle()
    {
            $classeModel = new ClasseModel();
            $typeCycle = $classeModel->classeComplet()->fetchAll();
            // var_dump($typeCycle);
            $primaire = [];
            $college = [];
            $lycee = [];
            foreach ($typeCycle as $key => $value) {
                if ($value->nom_typecycle == 'Enseignement Primaire') {
                    $primaire[] = $value;
                } elseif ($value->nom_typecycle == 'Enseignement secondaire inferieur') {
                    $college[] = $value;
                } elseif ($value->nom_typecycle == 'Enseignement secondaire superieur') {
                    $lycee[] = $value;
                }
            }
            $jsonData = json_encode([
                'primaire' => $primaire,
                'college' => $college,
                'lycee' => $lycee
            ]);
            header('Content-Type: application/json');
            echo $jsonData;
            exit();
    }
    /*
              [
                    'statut':
                    'message'
                    'datas'
              ]
            //faire une requete qui m'evite de faire les if/else
            // produire l'objet d'ici pour que le js contient aussi des objets, donc j'aurai pas besoin de le faire...
         */
}
