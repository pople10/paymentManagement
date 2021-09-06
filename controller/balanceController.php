<?php
session_start();
if(isset($_SESSION["user-id"])&&!empty($_SESSION["user-id"])){

chdir('..');

ini_set('display_errors', 1);

include_once "service/balanceService.php";

$balance = new balanceService();

$data;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	extract($_POST);
	
	if($op=="getBank")
		$data=$balance->getBankBalance();
	else if($op=="getVirtual")
		$data=$balance->getVirtualBalance();
	else if($op=="addTarget")
		$data=$balance->addTarget($amount,$currency);
	else if($op=="updateTarget")
		$data=$balance->updateTarget($amount,$currency);
	else if($op=="getTarget")
		$data=$balance->getTarget($currency);
	else if($op=="toTarget")
		$data=$balance->toTarget($currency);
    else if($op=="getTodayInsight")
		$data=$balance->getTodayInsight();
}

header('Content-type: application/json');
echo json_encode(array("data"=>$data));

}
?>