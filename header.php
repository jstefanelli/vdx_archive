<?php

include_once __DIR__ . '/localConfig.php'; //Defines VDX_HOME, LCL_HOME, FFMPEG_PATH and FFPROBE_PATH

session_start();

$db = mysqli_connect("localhost", "root", "", "vdx");

if(!$db){
	die("DB Connection Failed.");
}


?>