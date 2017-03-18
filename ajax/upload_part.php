<?php

include_once '../header.php';

if(!is_ajax()){
	die("Not ajax");
}

if(!isset($_FILES['file'])){
	die("No file");
}

if(!isset($_POST['name'])){
	die("No name");
}

if(!isset($_POST['id'])){
	die("No id");
}

$id = $_POST['id'];
$name = $_POST['name'];
$info = "";

if(!file_exists(LCL_HOME . "/videos/" . $id . "/" . $name . ".status.json")){
	die("Not Found.");
}

$inf = file_get_contents(LCL_HOME . "/videos/" . $id . "/" . $name . ".status.json");
$info = json_decode($inf);
$info->curr_parts++;
$inf = json_encode($info);
file_put_contents(LCL_HOME . "/videos/" . $id . "/" . $name . ".status.json", $inf);

move_uploaded_file($_FILES['file']['tmp_name'], LCL_HOME . "/videos/". $id . "/" . $name . "." . $info->curr_parts);

die("OK");

function is_ajax(){
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest";
}

?>