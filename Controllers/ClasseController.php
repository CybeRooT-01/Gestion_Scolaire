<?php

namespace App\Controllers;

use App\models\ClasseModel;

class ClasseController extends Controller
{
    public function index()
    {
        $classeModel = new ClasseModel();
        $classes = $classeModel->findAll();
        
        $this->render('classe/Classes.php', ['classes' => $classes]);
        if (isset($_POST['nom']) && isset($_POST['niveau']) && isset($_POST['cycle'])) {
            $nom = $_POST['nom'];
            $niveau = $_POST['niveau'];
            $type_cycle = $_POST['cycle'];
            if ($nom != '' && $niveau != '' && $type_cycle != '') {
                $classeModel->setNom($nom);
                $classeModel->setNiveau($niveau);
                $classeModel->setTypeCycle($type_cycle);
                $classeModel->create($classeModel);
                header('Location: /classe');
            }
        }
        if (isset($_POST['idClasse'])) {
            $id = (int)$_POST['idClasse'];
            $classeModel->delete($id);
            header('Location: /classe');
        }
        if (isset($_POST['modify'])) {
            $id = $_POST['idModify'];
            $modnom = $_POST['Modnom'];
            $modniveau = $_POST['Modniveau'];
            $modtype_cycle = $_POST['Modcycle'];
            $classeModel->setNom($modnom);
            $classeModel->setNiveau($modniveau);
            $classeModel->setTypeCycle($modtype_cycle);
            $classeModel->update($id, $classeModel);
            header('Location: /classe');
        }
    }
    public function supp(){
        $classeModel = new ClasseModel();
        $classeModel->findAll();
        if (isset($_POST['idClasse'])) {
            $id = (int)$_POST['idClasse'];
            $classeModel->delete($id);
            header('Location: /classe');
        }
    }
}
