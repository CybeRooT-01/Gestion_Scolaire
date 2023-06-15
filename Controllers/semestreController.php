<?php
namespace App\Controllers;
use App\models\SemestreModel;
class SemestreController extends Controller{
    protected $semestreModel;
    public function __construct()
    {
        $this->semestreModel = new SemestreModel();
    }
    public function index(){
        $semestre = $this->semestreModel->findAll();
        $this->render('semestre.php');
    }
    public function ValidateSemestre($semestre) {
        $pattern = '/^semestre\s\d+$/i';
    
        if (preg_match($pattern, $semestre)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function createSemester(){
        if(isset($_POST['semestre'])){
            $semestre = $_POST['semestre'];
            if($this->ValidateSemestre($semestre)){
                $this->semestreModel->setNom($semestre);
                $this->semestreModel->create($this->semestreModel);
                $this->redirect('/semestre');
            }else{
                echo "Le semestre doit etre sous la forme 'exemple: semestre 1'";
            }
        }
    }
}