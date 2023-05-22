<?php

namespace App\Controllers;

class navController extends Controller
{
    public function index()
    {
     $this->render('/main/index.php');
    }
}