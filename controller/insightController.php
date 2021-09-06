<?php
session_start();
if(isset($_SESSION["user-id"])&&!empty($_SESSION["user-id"])){

chdir('..');

ini_set('display_errors', 1);

include_once "service/insightService.php";

$insight = new insightService();

$data=null;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	extract($_POST);
	if(isset($op)){
		if($op=="lastSevenDaysGain")
			$data=$insight->lastSevenDaysGain($currency);
		else if($op=="lastSevenDaysLose")
			$data=$insight->lastSevenDaysLose($currency);
		if($op=="lastMonthDaysGain")
			$data=$insight->lastMonthDaysGain($currency);
		else if($op=="lastMonthDaysLose")
			$data=$insight->lastMonthDaysLose($currency);
		else if($op=="TotalReceived")
			$data=$insight->TotalReceived();
		else if($op=="TotalSent")
			$data=$insight->TotalSent();
		else if($op=="TotalPending")
			$data=$insight->TotalPending();
		else if($op=="TotalReceivedG")
			$data=$insight->TotalReceivedG();
		else if($op=="TotalSentG")
			$data=$insight->TotalSentG();
		else if($op=="TotalPendingG")
			$data=$insight->TotalPendingG();
		else if($op=="TotalReceivedU")
			$data=$insight->TotalReceivedU();
		else if($op=="TotalSentU")
			$data=$insight->TotalSentU();
		else if($op=="TotalPendingU")
			$data=$insight->TotalPendingU();
		else if($op=="search")
			$data=$insight->search($table,$type,$flow);
	}
	
}

header('Content-type: application/json');
echo json_encode(array("data"=>$data));

}
else
{
	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token    , Authorization');
	header('Content-type: application/json');
	echo json_encode(array("data" => "true"));
}
?>