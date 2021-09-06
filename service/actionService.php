<?php 
chdir('.');


include_once "connection/connection.php";



class actionService
{
	private $connexion;
	
	function __construct()
	{
		$this->connexion = new connexion();
		
	}
	public function findById($id)
	{
		$query="SELECT * FROM action WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($id));
		
		$answer = $req->fetch(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function add($task,$time,$priority)
	{
		$query="INSERT INTO action (task,time,priority,status) VALUES (?,?,?,?)";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($task,$time,$priority,"undone"));
		
	}
	public function findAll()
	{
		$query="SELECT * FROM action WHERE status='undone' ORDER BY priority DESC,time";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function selectDone()
	{
		$query="SELECT * FROM action WHERE status='done'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function update($task,$time,$priority,$id)
	{
		$query="UPDATE action SET task=?,time=?,priority=? WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($task,$time,$priority,$id));
		
	}
	public function deleteit($id)
	{
		$query="DELETE FROM action WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($id));
		
	}
	public function late()
	{
		$query="SELECT COUNT(*) as nbr FROM action WHERE NOW()>=time AND status='undone'";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetch(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function done($id)
	{
		$query="UPDATE action SET status=? WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array("done",$id));
		
	}
}

?>