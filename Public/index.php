<?php
// on definit une constante qui contient le dossier parent du projet

use App\Autoloader;
use App\Core\Application;

define('ROOT', dirname(__DIR__));
//j'importe  l'autoloader
require_once ROOT.'/Autoloader.php';
Autoloader::register();
$app =new Application;
$app->router->get('/', 'App\Controllers\ConnexionController@index');
$app->router->get('/connexion', 'App\Controllers\ConnexionController@index');
$app->router->get('/main', 'App\Controllers\navController@index');
$app->router->post('/main', 'App\Controllers\MainController@index');
$app->router->get('/annee', 'App\Controllers\AnneeController@index');
$app->router->post('/annee', 'App\Controllers\AnneeController@index');
$app->router->get('/classe', 'App\Controllers\ClasseController@index');
$app->router->post('/classe', 'App\Controllers\ClasseController@index');
$app->router->get('/eleve', 'App\Controllers\EleveController@index');
$app->router->post('/eleve', 'App\Controllers\EleveController@index');



$app->run();