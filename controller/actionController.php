<?php
session_start();
if(isset($_SESSION["user-id"])&&!empty($_SESSION["user-id"])){

chdir('..');

ini_set('display_errors', 1);

include_once "service/actionService.php";

$action = new actionService();

$data=$action->findAll();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	extract($_POST);
	if(isset($op)){
		if($op=="add")
			$data=$action->add($task,$time,$priority);
		else if($op=="findById")
			$data=$action->findById($id);
		else if($op=="update")
			$data=$action->update($task,$time,$priority,$id);
		else if($op=="delete")
			$data=$action->deleteit($id);
		else if($op=="late")
			$data=$action->late();
		else if($op=="done")
			$data=$action->done($id);
		else if($op=="selectUndone")
			$data=$action->selectUndone($id);
	}
	
}

header('Content-type: application/json');
echo json_encode(array("data"=>$data));
}
?>