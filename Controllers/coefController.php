<?php

namespace App\Controllers;

use App\models\CoefModel;

class coefController extends Controller
{
    protected $model;
    const ERRORMESSAGE = 'Les données ne sont pas conformes';
    const SUCCESSMESSAGE = 'Les données ont été modifiées avec succès';
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
        $this->render('coef.php', ['disciplines' => $disciplines, 
        'idclasse' => $idclasse, 
        'className' => $className]);
    }
    // public function delete()
    // {
    //     $datas = json_decode(file_get_contents('php://input'));
    //     $id = (int)$datas->id;
    //     $this->model->delete($id);
    //     $this->json(['status' => 'success', 'datas' => $datas]);
    // }

    public function update()
    {
        $datas = json_decode(file_get_contents('php://input'));
        if (isset($datas->ressources, $datas->examens, $datas->id)) {
            $ids = $datas->id;
            $ressources = $datas->ressources;
            $examens = $datas->examens;
            if (count($ids) === count($ressources) && count($ids) === count($examens)) {
                $allNumeric = true;
                for ($i = 0; $i < count($ids); $i++) {
                    $id = (int)$ids[$i];
                    if (!is_numeric($ressources[$i]) || !is_numeric($examens[$i])) {
                        $allNumeric = false;
                        break;
                    }
                    $ressource = ($ressources[$i] !== '') ? (int)$ressources[$i] : 20;
                    $examen = ($examens[$i] !== '') ? (int)$examens[$i] : 20;
                    $this->model->updateDiscipline($id, $ressource, $examen);
                }
                if ($allNumeric) {
                    $this->json(['status' => 'success', 'datas' => $datas, 'message' => 'Les coefficients ont été mis à jour']);
                } else {
                    $this->json(['status' => 'error', 'datas' => $datas, 'message' => 'Les données sont invalides']);
                }
            } else {
                $this->json(['status' => 'error', 'datas' => $datas, 'message' => 'Les données ne sont pas conformes']);
            }
        } else {
            $this->json(['status' => 'error', 'datas' => $datas, 'message' => 'Les données ne sont pas conformes']);
        }
    }
}
