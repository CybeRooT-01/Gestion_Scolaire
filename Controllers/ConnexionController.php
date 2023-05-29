<?php

namespace App\Controllers;

use App\Models\UsersModel;

class ConnexionController extends Controller
{
    protected $model;
    public function __construct()
    {
        $this->model = new UsersModel();
    }
    public function index(){
        if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $userTab = $this->model->findOnzByEmail(strip_tags($_POST['email']));
            if(!$userTab){
                $_SESSION['erreur'] = "L'addresse email et/ou le mot de passe est incorrect";
                $this->redirect('/connexion');
            }
            $user = $this->model->hydrate($userTab);
            if(password_verify($_POST['password'], $user->getPass())){
                $user->setSession();
                header('Location: /main');
            }else{
                $_SESSION['erreur'] = "L'addresse email et/ou le mot de passe est incorrect";
                $this->redirect('/connexion');
            }
        }

        $this->render('Connexion.php');
    }
    public function inscription(){
        if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $email = strip_tags($_POST['email']);
            $pass = password_hash($_POST['password'], PASSWORD_ARGON2ID);
            $user = new UsersModel();
            $user->setEmail($email);
            $user->setPass($pass);
            $user->create($user);
        }
        $this->render('inscription.php');
    }
    public function logout(){
        unset($_SESSION['user']);
        $this->redirect('/connexion');
    }
        
}

