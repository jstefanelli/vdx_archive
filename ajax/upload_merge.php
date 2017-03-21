<?php

include "../header.php";

if(!is_ajax()){
	die("Not ajax");
}

if(!isset($_POST['name'])){
	die("No name");
}

if(!isset($_POST['id'])){
	die("Not id");
}

$id = $_POST['id'];
$name = $_POST['name'];

$inf = file_get_contents(LCL_HOME . "/videos/" . $id . "/" . $name . ".status.json");
$info = json_decode($inf);

for($i = 1; $i <= $info->tot_parts; $i++){
	$cnts = file_get_contents(LCL_HOME . "/videos/" . $id . "/" . $name . "." . $i);

	file_put_contents(LCL_HOME . "/videos/" . $id . "/" . $name, $cnts, FILE_APPEND);
    unlink(LCL_HOME . "/videos/" . $id . "/" . $name . "." . $i);
}

unlink(LCL_HOME . "/videos/" . $id . "/" . $name . ".status.json");

echo("Ok");



?>