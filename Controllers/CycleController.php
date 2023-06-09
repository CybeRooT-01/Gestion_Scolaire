<?php

namespace App\Controllers;

use App\models\CycleModel;
use App\models\AnneeModel;

class CycleController extends Controller{
    protected $model;
    protected $annee;
    protected $active;
    const VIEWS = 'cycles/cycles.php';
    public function __construct()
    {
        $this->model = new CycleModel();
        $this->annee = new AnneeModel();
        $this->active = $this->annee->getActiveYear();
    }

    public function elementaire(){
        $allPrimaires = $this->model->getClasseByCycle('Enseignement primaire')->fetchAll();
        $this->render(self::VIEWS, ['cycle' => 'elementaire', 'classes' => $allPrimaires, 'active' => $this->active]);
    }
    
    public function secondaireInferieur(){
        $allSecondaires = $this->model->getClasseByCycle('Enseignement secondaire inférieur')->fetchAll();
        $this->render(self::VIEWS, ['cycle' => 'secondaireInferieur', 'classes' => $allSecondaires, 'active' => $this->active]);
    }
    
    public function secondaireSuperieur(){
        $allLycees = $this->model->getClasseByCycle('Enseignement secondaire supérieur')->fetchAll();
        $this->render(self::VIEWS, ['cycle' => 'secondaireSuperieur', 'classes' => $allLycees, 'active' => $this->active]);
    }
    
}