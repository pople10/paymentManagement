<?php
session_start();
if(isset($_SESSION["user-id"])&&!empty($_SESSION["user-id"])){

chdir('..');

ini_set('display_errors', 1);

include_once "service/contactService.php";

$contact_service = new contactService();

$data=$contact_service->findAll();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	extract($_POST);
	if(isset($op)){
		if($op=="add")
			$data=$contact_service->add($name,$contact,$contactType);
		else if($op=="findById")
			$data=$contact_service->findById($id);
		else if($op=="update")
			$data=$contact_service->update($name,$contact,$contactType,$id);
		else if($op=="delete")
			$data=$contact_service->deleteit($id);
	}
	
}

header('Content-type: application/json');
echo json_encode(array("data"=>$data));
}
?>