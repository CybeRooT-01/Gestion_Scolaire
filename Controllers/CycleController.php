<?php

namespace App\Controllers;

use App\models\CycleModel;
use App\models\AnneeModel;

class CycleController extends Controller{
    protected $model;
    protected $annee;
    protected $active;
    public function __construct()
    {
        $this->model = new CycleModel();
        $this->annee = new AnneeModel();
        $this->active = $this->annee->getActiveYear();
    }

    public function elementaire(){
        $allPrimaires = $this->model->getClasseByCycle('Enseignement primaire');
        $this->render('cycles/elementaire.php', ['cycle' => $allPrimaires, 'active' => $this->active]);
    }
    public function secondaireInferieur(){
        $allSecondaires = $this->model->getClasseByCycle('Enseignement secondaire inférieur');
        $this->render('cycles/secondaireInferieur.php', ['cycle' => $allSecondaires, 'active' => $this->active]);
    }
    public function secondaireSuperieur(){
        $allLycees = $this->model->getClasseByCycle('Enseignement secondaire supérieur');
        $this->render('cycles/secondaireSuperieur.php', ['cycle' => $allLycees, 'active' => $this->active]);
    }
}