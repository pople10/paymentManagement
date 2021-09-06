<?php

session_start();
if(isset($_SESSION["user-id"])&&!empty($_SESSION["user-id"])){

chdir('..');

ini_set('display_errors', 1);

include_once "service/pendingService.php";

$pending = new pendingService();

$data=$pending->findAll();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	extract($_POST);
	if(isset($op)){
		if($op=="add")
			$data=$pending->add($amount,$type,$date,$currency,$warrently,$target,$flow);
		else if($op=="findById")
			$data=$pending->findById($id);
		else if($op=="update")
			$data=$pending->update($amount,$currency,$warrently,$target,$type,$date,$id,$flow);
		else if($op=="delete")
			$data=$pending->deleteit($id);
		else if($op=="getMonthsByYear_USD")
			$data=$pending->getMonthsByYear_USD();
		else if($op=="getMonthsByYear_MAD")
			$data=$pending->getMonthsByYear_MAD();
		else if($op=="getYears_USD")
			$data=$pending->getYears_USD();
		else if($op=="getYears_MAD")
			$data=$pending->getYears_MAD();
		else if($op=="complete")
			$data=$pending->complete($id);
		else if($op=="pendingUSD")
			$data=$pending->pendingUSD();
		else if($op=="pendingMAD")
			$data=$pending->pendingMAD();
		else if($op=="late")
			$data=$pending->late();
	}
	
}

header('Content-type: application/json');
echo json_encode(array("data"=>$data));
}
?>