<?php 
chdir('.');


include_once "connection/connection.php";


class balanceService
{
	private $connexion;
	
	function __construct()
	{
		$this->connexion = new connexion();
	}
	public function getBankBalance()
	{
		$query="SELECT amount FROM balances WHERE label='bank'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetch(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function getVirtualBalance()
	{
		$query="SELECT amount FROM balances WHERE label='virtual'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetch(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function addTarget($amount,$currency)
	{
		$query="INSERT INTO target (amount,currency) VALUES (?,?);";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($amount,$currency));
	}
	public function updateTarget($amount,$currency)
	{
		$query="UPDATE target SET amount=? WHERE currency=?;";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($amount,$currency));
	}
	public function getTarget($currency)
	{
		$query="SELECT amount as amount FROM target WHERE currency=?;'";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($currency));
		
		$answer = $req->fetch(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function toTarget($currency)
	{
		$query="SELECT amount as amount FROM target WHERE currency=?;'";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($currency));
		
		$answer = (array)$req->fetch(PDO::FETCH_OBJ);
		
		$req->closeCursor();
		
		$amount_targeted = $answer["amount"];
		
		$query="SELECT amount FROM balances WHERE label='bank'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = (array)$req->fetch(PDO::FETCH_OBJ);
		
		$amount_final=$amount_targeted-$answer["amount"];
		
		return $amount_final;
	}
    public function getTodayInsight()
	{
		$query="SELECT SUM(amount) as amount FROM gain WHERE date=date(NOW()) AND currency='USD'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = (array)$req->fetch(PDO::FETCH_OBJ);
        
        $gain_USD = ($answer["amount"]==NULL)?0:$answer["amount"];
        
        $query="SELECT SUM(amount) as amount FROM gain WHERE date=date(NOW()) AND currency='MAD'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = (array)$req->fetch(PDO::FETCH_OBJ);
        
        $gain_MAD = ($answer["amount"]==NULL)?0:$answer["amount"];
        
        $query="SELECT SUM(amount) as amount FROM lose WHERE date=date(NOW()) AND currency='USD'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = (array)$req->fetch(PDO::FETCH_OBJ);
        
        $lose_USD = ($answer["amount"]==NULL)?0:$answer["amount"];
        
        $query="SELECT SUM(amount) as amount FROM lose WHERE date=date(NOW()) AND currency='MAD'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = (array)$req->fetch(PDO::FETCH_OBJ);
        
        $lose_MAD = ($answer["amount"]==NULL)?0:$answer["amount"];
        
        $array = array("gain_USD"=>$gain_USD,"gain_MAD"=>$gain_MAD,"lose_USD"=>$lose_USD,"lose_MAD"=>$lose_MAD,"profit_USD"=>$gain_USD-$lose_USD,"profit_MAD"=>$gain_MAD-$lose_MAD);
		
		return $array;
	}
}
?>