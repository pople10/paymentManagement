<?php 
chdir('.');


include_once "connection/connection.php";



class contactService
{
	private $connexion;
	
	function __construct()
	{
		$this->connexion = new connexion();
		
	}
	public function findById($id)
	{
		$query="SELECT * FROM contact WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($id));
		
		$answer = $req->fetch(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function add($name,$contact,$contactType)
	{
		$query="INSERT INTO contact (name,contact,contactType) VALUES (?,?,?)";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($name,$contact,$contactType));
		
	}
	public function findAll()
	{
		$query="SELECT * FROM contact";
		
		$req = $this->connexion->getConnexion()->query($query);
		
		$answer = $req->fetchAll(PDO::FETCH_OBJ);
		
		return $answer;
	}
	public function update($name,$contact,$contactType,$id)
	{
		$query="UPDATE contact SET name=?,contact=?,contactType=? WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($name,$contact,$contactType,$id));
		
	}
	public function deleteit($id)
	{
		$query="DELETE FROM contact WHERE id=?";
		
		$req = $this->connexion->getConnexion()->prepare($query);
		
		$req->execute(array($id));
		
	}
	
}

?>