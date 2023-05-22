<?php
namespace App\Controllers;

class ArticleController extends Controller
{
    public function index()
    {
     $this->render('articles.php', ['styles'=> '/styles/home.css']);
    }
}