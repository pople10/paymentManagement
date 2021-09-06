<?php 
chdir('.');


include_once "connection/connection.php";


class gainService
{
	private $connexion;
	
	function __construct()
	{
		$this->connexion = new connexion();
	}
	public function findById($id)
	{
		$query="SELECT * FROM gain WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($id));
		
		$answer = $req->fetch(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function add($amount,$type,$date,$currency,$warrently,$target)
	{
		$query="INSERT INTO gain (amount,type,date,currency,warrently,target) VALUES (?,?,?,?,?,?)";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($amount,$type,$date,$currency,$warrently,$target));
		
		$query="SELECT amount FROM balances WHERE label=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($target));
		
		$temp=(array)$req->fetch(PDO::FETCH_OBJ);
		
		
		$newBalance = $temp["amount"]+(float)$amount;
		
		
		$query="UPDATE balances SET amount=? WHERE label=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($newBalance,$target));
	}
	public function findAll()
	{
		$query="SELECT * FROM gain";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function update($amount,$currency,$warrently,$target,$type,$date,$id)
	{	
		$query="SELECT amount FROM gain WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($id));
		
		$oldamount_array = (array)$req->fetch(PDO::FETCH_OBJ);
		
		$oldamount=$oldamount_array["amount"];
		
		$validamount=$amount-$oldamount;
		
		$query="UPDATE gain SET amount=?,currency=?,warrently=?,target=?,type=?,date=? WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($amount,$currency,$warrently,$target,$type,$date,$id));
		
		$query="SELECT amount FROM balances WHERE label=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($target));
		
		$temp=(array)$req->fetch(PDO::FETCH_OBJ);
		
		$newBalance = $temp["amount"]+(float)$validamount;
		
		$query="UPDATE balances SET amount=? WHERE label=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($newBalance,$target));
		
	}
	public function deleteit($id)
	{
		$query="SELECT * FROM gain WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($id));
		
		$oldamount_array = (array)$req->fetch(PDO::FETCH_OBJ);
		
		$target=$oldamount_array["target"];
		
		$amount=$oldamount_array["amount"];
		
		$query="DELETE FROM gain WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($id));
		
		$query="SELECT amount FROM balances WHERE label=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($target));
		
		$temp=(array)$req->fetch(PDO::FETCH_OBJ);
		
		$newBalance = $temp["amount"]-(float)$amount;
		
		$query="UPDATE balances SET amount=? WHERE label=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($newBalance,$target));
		
	}
	public function getMonthsByYear_USD()
	{
		$query="SELECT SUM(amount) as amount,month(date) as month FROM gain WHERE year(date)=year(NOW()) AND currency='USD' GROUP BY month(date)";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function getMonthsByYear_MAD()
	{
		$query="SELECT SUM(amount) as amount,month(date) as month FROM gain WHERE year(date)=year(NOW()) AND currency='MAD' GROUP BY month(date)";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function getYears_USD()
	{
		$query="SELECT SUM(amount) as amount,year(date) as year FROM gain WHERE currency='USD' GROUP BY year(date) LIMIT 10";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function getYears_MAD()
	{
		$query="SELECT SUM(amount) as amount,year(date) as year FROM gain WHERE currency='MAD' GROUP BY year(date) LIMIT 10";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
}

?>