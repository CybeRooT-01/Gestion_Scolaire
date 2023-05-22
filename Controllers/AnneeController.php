<?php

namespace App\Controllers;

use App\models\AnneeModel;

class AnneeController extends Controller
{
    public function index()
    {
        $anneeModel = new AnneeModel();
        $annees = $anneeModel->findAll();
        $this->render('annee/Annees.php', compact('annees'));
        if(isset( $_POST['debut_annee']) && isset($_POST['fin_annee'])){
            $debut =(int)$_POST['debut_annee'];
            $fin =(int) $_POST['fin_annee'];
            if($debut >= 2000 && $fin >= 2000 && $fin - $debut == 1){
                $anneeModel->setDebutAnneeScolaire($debut);
                $anneeModel->setFinAnneeScolaire($fin);
                $anneeModel->create($anneeModel);
                header('Location: /annee');
                exit();
            }else{
                echo "Annees non concordant";
            }
        }
        if(isset( $_POST['updtateDepart']) && isset($_POST['updatefin']) && isset($_POST['idYear'])){
            
            $debut =(int)$_POST['updtateDepart'];
            $fin =(int) $_POST['updatefin'];
            $id = (int)$_POST['idYear'];
            if($debut >= 2000 && $fin >= 2000 && $fin - $debut == 1){
                $anneeModel->setDebutAnneeScolaire($debut);
                $anneeModel->setFinAnneeScolaire($fin);
                $anneeModel->update($id, $anneeModel);
                header('Location: /annee');
                exit();
            }else{
                echo "Annees non concordant";
            }
        }
        if(isset($_POST['deleteYear'])){
            $id = (int)$_POST['deleteYear'];
            $anneeModel->delete($id);
            header('Location: /annee');
            exit();
        }
    }
}