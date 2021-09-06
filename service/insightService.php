<?php 
chdir('.');


include_once "connection/connection.php";



class insightService
{
	private $connexion;
	
	function __construct()
	{
		$this->connexion = new connexion();
		
	}
	public function lastSevenDaysGain($currency)
	{
		$query="SELECT SUM(`amount`) as amount,`date` as date FROM `gain` WHERE DATE(`date`) > (NOW() - INTERVAL 7 DAY) AND `currency`=? GROUP BY `date` ORDER BY  `date` DESC";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($currency));
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function lastSevenDaysLose($currency)
	{
		$query="SELECT SUM(`amount`) as amount,`date` as date FROM `lose` WHERE DATE(`date`) > (NOW() - INTERVAL 7 DAY) AND `currency`=? GROUP BY `date` ORDER BY  `date` DESC";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($currency));
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function lastMonthDaysGain($currency)
	{
		$query="SELECT SUM(`amount`) as amount,`date` as date FROM `gain` WHERE DATE(`date`) > (NOW() - INTERVAL 30 DAY) AND `currency`=? GROUP BY `date` ORDER BY  `date` DESC";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($currency));
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function lastMonthDaysLose($currency)
	{
		$query="SELECT SUM(`amount`) as amount,`date` as date FROM `lose` WHERE DATE(`date`) > (NOW() - INTERVAL 30 DAY) AND `currency`=? GROUP BY `date` ORDER BY  `date` DESC";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($currency));
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function TotalReceived()
	{
		$query="SELECT COUNT(*) as nbr,SUM(`amount`) as total,`currency` as currency FROM `gain` GROUP BY `currency`;";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute();
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function TotalSent()
	{
		$query="SELECT COUNT(*) as nbr,SUM(`amount`) as total,`currency` as currency FROM `lose` GROUP BY `currency`;";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute();
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function TotalPending()
	{
		$query="SELECT COUNT(*) as nbr,SUM(`amount`) as total,`currency` as currency, `flow` as flow FROM `pending` GROUP BY `currency`,`flow`;";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute();
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	/**************************************Guaranteed*****************************************************/
	public function TotalReceivedG()
	{
		$query="SELECT COUNT(*) as nbr,SUM(`amount`) as total,`currency` as currency FROM `gain` WHERE `warrently`='1' GROUP BY `currency`;";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute();
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function TotalSentG()
	{
		$query="SELECT COUNT(*) as nbr,SUM(`amount`) as total,`currency` as currency FROM `lose` WHERE `warrently`='1' GROUP BY `currency`;";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute();
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function TotalPendingG()
	{
		$query="SELECT COUNT(*) as nbr,SUM(`amount`) as total,`currency` as currency, `flow` as flow FROM `pending` WHERE `warrently`='1' GROUP BY `currency`,`flow`;";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute();
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	/**************************************Unguaranteed*****************************************************/
	public function TotalReceivedU()
	{
		$query="SELECT COUNT(*) as nbr,SUM(`amount`) as total,`currency` as currency FROM `gain` WHERE `warrently`='0' GROUP BY `currency`;";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute();
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function TotalSentU()
	{
		$query="SELECT COUNT(*) as nbr,SUM(`amount`) as total,`currency` as currency FROM `lose` WHERE `warrently`='0' GROUP BY `currency`;";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute();
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function TotalPendingU()
	{
		$query="SELECT COUNT(*) as nbr,SUM(`amount`) as total,`currency` as currency, `flow` as flow FROM `pending` WHERE `warrently`='0' GROUP BY `currency`,`flow`;";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute();
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function search($table,$type,$flow)
	{
		if($table!="pending"){
		
		$flow="1";
			
		$query="SELECT COUNT(*) as nbr,SUM(amount) as total,currency as currency FROM $table WHERE type LIKE ? AND ? GROUP BY currency;";}
		
		else
		
		$query="SELECT COUNT(*) as nbr,SUM(amount) as total,currency as currency FROM $table WHERE type LIKE ? AND flow=? GROUP BY currency;";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array("%".$type."%",$flow));
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
}

?>