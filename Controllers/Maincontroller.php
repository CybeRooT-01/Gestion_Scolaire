<?php
namespace App\Controllers;

use App\models\AnneeModel;
class MainController extends Controller
{
    // public function index(){
    //     include ROOT.'/Views/main/index.php';
    // }
    public function index()
    {
        $annee=new AnneeModel();
        $active = $annee->getActiveYear();
     $this->render('main/index.php',  ['active'=> $active]);
    }
}