<?php 

set_time_limit(0);


class connexion
{
	private $connexion;



    public function __construct() {

        $conf = array

            (

            'host' => 'localhost',

            'database' => 'management',

            'login' => 'root',

            'password' => ''  

        );   

        try {

            $this->connexion = new PDO('mysql:host=' . $conf['host'] . ';dbname=' . $conf['database'] . ';', $conf['login'], $conf['password']);

            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->connexion->query("SET NAMES UTF8");

            $this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        } catch (Exception $e) {

            die('Erreur : ' . $e->getMessage());

        }

    }



    function getConnexion() {

        return $this->connexion;

    }   
}
?>
