<?php 
chdir('.');


include_once "connection/connection.php";

include_once "connection/bcrypt.php";

class loginService
{
	private $connexion;
	
	private $brypt;
	
	function __construct()
	{
		$this->connexion = new connexion();
		
		$this->brypt = new Bcrypt(5);
		
	}
	
	public function checkLogin($user,$password)
	{
		$query="SELECT id as id,password as password FROM user WHERE user=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($user));
		
		$answer = (array)$req->fetch(PDO::FETCH_OBJ);
		
		$id=0;
		
		if(isset($answer["password"])&&isset($answer["id"]))
		{
			
			$password_selected = $answer["password"];
			
			if($this->brypt->verify($password, $password_selected))
				
				$id=$answer["id"];
		}
		if($id!=0)
			$this->startSession($id);
		
		return $id;
	}	
	public function startSession($id)
	{
		session_start();
		$_SESSION["user-id"]=$id;
	}
}
?>