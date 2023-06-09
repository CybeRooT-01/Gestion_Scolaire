<?php
// on definit une constante qui contient le dossier parent du projet

use App\Autoloader;
use App\Core\Application;
use App\Core\Router;

define('ROOT', dirname(__DIR__));
//j'importe  l'autoloader
require_once ROOT.'/Autoloader.php';
Autoloader::register();
$app =new Application;

$app->router->get('/', 'App\Controllers\ConnexionController@index');

$app->router->get('/niveau', 'App\Controllers\navController@index');
$app->router->post('/niveau', 'App\Controllers\MainController@index');


$app->router->get('/classe', 'App\Controllers\ClasseController@index');
$app->router->post('/classe', 'App\Controllers\ClasseController@index');

$app->router->get('/eleve', 'App\Controllers\EleveController@index');
$app->router->post('/eleve', 'App\Controllers\EleveController@index');

$app->router->get('/annee', 'App\Controllers\AnneeController@index');
$app->router->post('/annee/change', 'App\Controllers\AnneeController@changeStatus');
$app->router->post('/annee/delete', 'App\Controllers\AnneeController@deleteYear');
$app->router->post('/annee/create', 'App\Controllers\AnneeController@createYear');

$app->router->get('/connexion', 'App\Controllers\ConnexionController@index');
$app->router->post('/connexion', 'App\Controllers\ConnexionController@index');

$app->router->get('/getTypesClasses', 'App\Controllers\ClasseController@getTypeCycle');

// route vers liste des typesdecycle
$app->router->get('/niveau/elementaire', 'App\Controllers\CycleController@elementaire');
$app->router->get('/niveau/moyen', 'App\Controllers\CycleController@secondaireInferieur');
$app->router->get('/niveau/secondaire', 'App\Controllers\CycleController@secondaireSuperieur');

$app->router->get('/liste/:nom' ,'App\Controllers\listeController@index');
$app->router->get('/inscription', 'App\Controllers\ConnexionController@inscription');
$app->router->post('/inscription', 'App\Controllers\ConnexionController@inscription');
$app->router->get('/logout', 'App\Controllers\ConnexionController@logout');

$app->router->post('/discipline/gestion', 'App\Controllers\disciplineController@index');
$app->router->get('/discipline/gestion', 'App\Controllers\disciplineController@index');

$app->router->post('/discipline/ajout', 'App\Controllers\disciplineController@ajout');
$app->router->get('/discipline/ajout', 'App\Controllers\disciplineController@ajout');

$app->router->get('/discipline/getDatas', 'App\Controllers\disciplineController@getDatas');

$app->router->post('/discipline/delete', 'App\Controllers\disciplineController@delete');
$app->router->get('/discipline/delete', 'App\Controllers\disciplineController@delete');

$app->router->post('/js/test', 'App\Controllers\disciplineController@test');
$app->run();