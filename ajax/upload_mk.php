<?php

class upload_info{
	public $tot_parts;
	public $part_size;
	public $curr_parts;
	public $id;
	public $name;
}

include_once '../header.php';

if(!is_ajax()){
	die("Not ajax");
}

if(!isset($_POST['n_parts'])){
	die("No parts");
}

if(!isset($_POST['part_size'])){
	die("No size");
}

if(!isset($_POST['name'])){
	die("No name");
}

if(!isset($_POST['id'])){
	die("No id");
}

$id = $_POST['id'];
$name = $_POST['name'];
$n_parts = $_POST['n_parts'];
$part_size = $_POST['part_size'];

if(!file_exists(LCL_HOME . "/videos")){
	mkdir(LCL_HOME . "/videos");
}

if(file_exists(LCL_HOME . '/videos/' . $id . '/' . $name)){
	die("Already Uploaded");
}else{
	if(!file_exists(LCL_HOME . "/videos/" . $id)){
		mkdir(LCL_HOME . "/videos/" . $id);
	}
}
$info = new upload_info();
$info->tot_parts = $n_parts;
$info->curr_parts = 0;
$info->name = $name;
$info->id = $id;
$info->part_size = $part_size;

$jsonInfo = json_encode($info);
file_put_contents(LCL_HOME. "/videos/" . $id . "/" . $name . ".status.json", $jsonInfo);

die("OK");
