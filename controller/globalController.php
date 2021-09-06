<?php
session_start();
if(isset($_SESSION["user-id"])&&!empty($_SESSION["user-id"])){

chdir('..');

ini_set('display_errors', 1);

include_once "service/globalService.php";

$global = new globalService();

$data;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	extract($_POST);
	
	if($op=="securePayments")
		$data=$global->securePayments();
}

header('Content-type: application/json');
echo json_encode(array("data"=>$data));

}
?>