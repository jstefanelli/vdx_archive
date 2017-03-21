<?php

include '../header.php';

if(!is_ajax()){
	die("Not ajax");
}

if(!isset($_POST['psw'])){
	die("No password");
}

$myPsw = $_POST['psw'];
if($myPsw == LCL_PSW){
	$db->query("INSERT INTO mirrors (address) VALUES(" . VDX_HOME . ")");
	die("OK");
}else{
	die("Wrong password");
}



?>
