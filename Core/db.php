<?php
namespace App\Core;

use PDO; //on importe pdo prsk de base il le reconnait mais quand on met un namespace il le reconnait plus

use PDOException;

class db extends PDO
{
    private static $instance; //instance unique de la classe (on va utiliser le desing pattern de singleton)

    //infos de connexion a la base
    private const DBNAME = 'school';
    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = 'cyberoot010110.';

    private function __construct()
    {
        $_dsn = 'mysql:dbname='.self::DBNAME.';host='.self::DBHOST ; //notre dsn de connexion
        
        //on appel le constructeur de pdo
        try {
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf-8'); //ici this est pdo vu qu'on etend pdo
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    //on ne pourra pas instancier ce constructeur donc on va creer une methode qui va verifier
    //si y'a une instance du constructeur il le copie si y'en a pas il le cree... le principe des singleton.

    public static function getInstance():PDO
    {
        if (self::$instance ===null) {
            self::$instance = new self;
            //ou new db vu que notre classe s'appel db et le constructeur contient nos infos de connection
        }
        return self::$instance;
    }
}
//maintenant pour appeler notre db on met juste db::getinstance
//on cree maintenant une classmodel qui conetient un crud
// qui sera ensuite utilisé par d'autres classe afin d'interagir avec notre bd