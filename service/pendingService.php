<?php 
chdir('.');


include_once "connection/connection.php";

include_once "service/gainService.php";

include_once "service/loseService.php";



class pendingService
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
	public function findById($id)
	{
		$query="SELECT * FROM pending WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($id));
		
		$answer = $req->fetch(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function add($amount,$type,$date,$currency,$warrently,$target,$flow)
	{
		$query="INSERT INTO pending (amount,type,date,currency,warrently,target,flow) VALUES (?,?,?,?,?,?,?)";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($amount,$type,$date,$currency,$warrently,$target,$flow));
		
	}
	public function findAll()
	{
		$query="SELECT * FROM pending";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function update($amount,$currency,$warrently,$target,$type,$date,$id,$flow)
	{
		$query="UPDATE pending SET amount=?,currency=?,warrently=?,target=?,type=?,date=?,flow=? WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($amount,$currency,$warrently,$target,$type,$date,$flow,$id));
		
	}
	public function deleteit($id)
	{
		$query="DELETE FROM pending WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($id));
		
	}
	public function getMonthsByYear_USD()
	{
		$query="SELECT SUM(amount) as amount,month(date) as month FROM pending WHERE year(date)=year(NOW()) AND currency='USD' GROUP BY month(date) ASC";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function getMonthsByYear_MAD()
	{
		$query="SELECT SUM(amount) as amount,month(date) as month FROM pending WHERE year(date)=year(NOW()) AND currency='MAD' GROUP BY month(date) ASC";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function getYears_USD()
	{
		$query="SELECT SUM(amount) as amount,year(date) as year FROM pending WHERE currency='USD' GROUP BY year(date) ASC LIMIT 10";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function getYears_MAD()
	{
		$query="SELECT SUM(amount) as amount,year(date) as year FROM pending WHERE currency='MAD' GROUP BY year(date) ASC LIMIT 10";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function complete($id)
	{	
		$query="SELECT * FROM pending WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($id));
		
		$answer = (array)$req->fetch(PDO::FETCH_OBJ);
		
		$amount=$answer["amount"];
		
		$type=$answer["type"];
		
		$currency=$answer["currency"];
		
		$warrently=$answer["warrently"];
		
		$target=$answer["target"];
		
		$date = date("Y-m-d");
		
		if($answer["flow"]=="received")
			{
				$this->gain->add($amount,$type,$date,$currency,$warrently,$target);
			}
		else if($answer["flow"]=="sent")
			{
				$this->lose->add($amount,$type,$date,$currency,$warrently,$target);
			}
		$query="DELETE FROM pending WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($id));
		
	}
	public function pendingMAD()
	{
		$query="SELECT SUM(amount) as amount FROM pending WHERE currency='MAD' AND flow='received'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer1 = (array)$req->fetch(PDO::FETCH_OBJ);
		
		$query="SELECT SUM(amount) as amount FROM pending WHERE currency='MAD' AND flow='sent'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer2 = (array)$req->fetch(PDO::FETCH_OBJ);
		
		$answer = $answer1["amount"]-$answer2["amount"];
		
		return $answer;
	}
	public function pendingUSD()
	{
		$query="SELECT SUM(amount) as amount FROM pending WHERE currency='USD' AND flow='received'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer1 = (array)$req->fetch(PDO::FETCH_OBJ);
		
		$query="SELECT SUM(amount) as amount FROM pending WHERE currency='USD' AND flow='sent'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer2 = (array)$req->fetch(PDO::FETCH_OBJ);
		
		$answer = $answer1["amount"]-$answer2["amount"];
		
		return $answer;
	}
	public function late()
	{
		$query="SELECT COUNT(*) as nbr FROM pending WHERE date(NOW())>=date";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetch(PDO::FETCH_OBJ);
		
		return $answer;
	}
}

?>