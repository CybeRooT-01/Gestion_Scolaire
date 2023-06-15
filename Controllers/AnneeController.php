<?php

namespace App\Controllers;

use App\models\AnneeModel;

class AnneeController extends Controller
{
    protected $anneeModel;
    public const ANNEE = '/annee';

    public function __construct()
    {
        $this->anneeModel = new AnneeModel();
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            $annees = $this->anneeModel->findAll();
            $this->render('annee/Annees.php', compact('annees'));
        } else {
            $this->redirect('/connexion');
        }
    }

    public function validateYear($annee)
    {
        $debut = (int) substr($annee, 0, 4);
        $fin = (int) substr($annee, 5, 9);
        return strlen($annee) == 9 && $annee[4] == '-' && $fin - $debut == 1 ? true : false;
    }

    public function createYear()
    {
        $errorMessage = '';
        if (isset($_POST['annee'])) {
            $annee = $_POST['annee'];
            if ($this->validateYear($annee)) {
                $this->anneeModel->setAnneeScolaire($annee);
                $this->anneeModel->create($this->anneeModel);
                $this->redirect(self::ANNEE);

            } else {
                $errorMessage = 'Veuillez entrer une année valide';
            }
        }
    }

    public function deleteYear()
    {
        if (isset($_POST['deleteYear'])) {
            $id = (int) $_POST['deleteYear'];
            $this->anneeModel->delete($id);
        }
        $this->redirect(self::ANNEE);
    }

    public function changeStatus()
    {
        if (isset($_POST['active'])) {
            $id = (int) $_POST['statid'];
            $nouveauStatut = ($_POST['active'] == 'active') ? 'inactive' : 'active';
            $this->anneeModel->mettreLesAutreInactive();
            $this->anneeModel->updateStatut($id, $nouveauStatut);
            $this->redirect('/niveau');
        }
    }
}
