<?php

namespace App\Controllers;

use App\models\CoefModel;

class coefController extends Controller
{
    protected $model;
    public function __construct()
    {
        $this->model = new CoefModel();
    }
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
    public function delete()
{
    $datas = json_decode(file_get_contents('php://input'));
    $id = (int)$datas->id;
    $this->model->delete($id);
    $this->json(['status' => 'success', 'datas' => $datas]);
}

}
