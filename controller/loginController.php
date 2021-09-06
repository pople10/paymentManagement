<?php
chdir('..');

ini_set('display_errors', 1);

include_once "service/loginService.php";

$login = new loginService();

$data=null;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	extract($_POST);
	if(isset($op)){
		if($op=="checkLogin")
			$data=$login->checkLogin($user,$passwordd);
	}
	
}

header('Content-type: application/json');
echo json_encode(array("data"=>$data));
?>