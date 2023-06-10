<?php

namespace App\Controllers;

use App\models\CoefModel;

class coefController extends Controller
{
    public function index()
    {
        $nom = $_SERVER['REQUEST_URI'];
        $nom = explode('/', $nom);
        $idclasse = (int)$nom[3];
        $coef = new CoefModel();
        $disciplines = $coef->getDisciplineByIdClasse($idclasse);
        $className = $coef->findClassNameByClassId($idclasse);
        $this->render('coef.php', ['disciplines' => $disciplines, 'idclasse' => $idclasse, 'className'=>$className]);
    }
}
