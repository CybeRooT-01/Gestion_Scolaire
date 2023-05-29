<?php

namespace App\Controllers;

use App\Models\AnneeModel;
class navController extends Controller
{
    public function index()
    {
        $annee=new AnneeModel();
        $active = $annee->getActiveYear();
     $this->render('/main/index.php', compact('active'));
    }
}