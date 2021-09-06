<?php
session_start();
if(isset($_SESSION["user-id"])&&!empty($_SESSION["user-id"])){
	
chdir('..');

ini_set('display_errors', 1);

include_once "service/actionService.php";

$action = new actionService();

$data=$action->selectDone();

header('Content-type: application/json');
echo json_encode(array("data"=>$data));

}
?>