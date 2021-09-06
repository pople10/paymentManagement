<?php
session_start();
if(isset($_SESSION["user-id"])&&!empty($_SESSION["user-id"])){

chdir('..');

ini_set('display_errors', 1);

include_once "service/gainService.php";

$gain = new gainService();

$data=$gain->findAll();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	extract($_POST);
	if(isset($op)){
		if($op=="add")
			$data=$gain->add($amount,$type,$date,$currency,$warrently,$target);
		else if($op=="findById")
			$data=$gain->findById($id);
		else if($op=="update")
			$data=$gain->update($amount,$currency,$warrently,$target,$type,$date,$id);
		else if($op=="delete")
			$data=$gain->deleteit($id);
		else if($op=="getMonthsByYear_USD")
			$data=$gain->getMonthsByYear_USD();
		else if($op=="getMonthsByYear_MAD")
			$data=$gain->getMonthsByYear_MAD();
		else if($op=="getYears_USD")
			$data=$gain->getYears_USD();
		else if($op=="getYears_MAD")
			$data=$gain->getYears_MAD();
			
	}
	
}

header('Content-type: application/json');
echo json_encode(array("data"=>$data));

}
?>