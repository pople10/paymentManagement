<?php

session_start();
if(isset($_SESSION["user-id"])&&!empty($_SESSION["user-id"])){

chdir('..');

ini_set('display_errors', 1);

include_once "service/loseService.php";

$lose = new loseService();

$data=$lose->findAll();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	extract($_POST);
	if(isset($op)){
		if($op=="add")
			$data=$lose->add($amount,$type,$date,$currency,$warrently,$target);
		else if($op=="findById")
			$data=$lose->findById($id);
		else if($op=="update")
			$data=$lose->update($amount,$currency,$warrently,$target,$type,$date,$id);
		else if($op=="delete")
			$data=$lose->deleteit($id);
		else if($op=="getMonthsByYear_USD")
			$data=$lose->getMonthsByYear_USD();
		else if($op=="getMonthsByYear_MAD")
			$data=$lose->getMonthsByYear_MAD();
		else if($op=="getYears_USD")
			$data=$lose->getYears_USD();
		else if($op=="getYears_MAD")
			$data=$lose->getYears_MAD();
			
	}
	
}

header('Content-type: application/json');
echo json_encode(array("data"=>$data));

}
?>