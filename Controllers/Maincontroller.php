<?php
namespace App\Controllers;

class MainController extends Controller
{
    // public function index(){
    //     include ROOT.'/Views/main/index.php';
    // }
    public function index()
    {
     $this->render('main/index.php', ['styles'=> '/styles/home.css']);
    }
}