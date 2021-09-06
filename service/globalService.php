<?php 
chdir('.');


include_once "connection/connection.php";

include_once "service/gainService.php";

include_once "service/loseService.php";



class globalService
{
	private $connexion;
	
	private $gain;
	
	private $lose;
	
	function __construct()
	{
		$this->connexion = new connexion();
		
		$this->gain = new gainService();

		$this->lose = new loseService();
	}
	public securePayments()
    {
        $query="UPDATE lose SET warrently='1' WHERE DATE(date) < (NOW() - INTERVAL 90 DAY)";
		
		$req = $this->connexion->getConnexion()->query($query);
        
        $query="UPDATE gain SET warrently='1' WHERE DATE(date) < (NOW() - INTERVAL 90 DAY)";
		
		$req = $this->connexion->getConnexion()->query($query);
    }
}

?>