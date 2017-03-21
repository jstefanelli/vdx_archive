<?php

include "../header.php";

if(!is_ajax()){
    die("Not ajax");
}

if(!isset($_REQUEST['id'])){
    die("No id");
}

$id = $_REQUEST['id'];
$has240 = false;
$has480 = false;
$hasOriginal = false;

if(file_exists(LCL_HOME . "/videos/" . $id . "/240p.mp4")){
    $has240 = true;
}
if(file_exists(LCL_HOME . "/videos/" . $id . "/480p.mp4")){
    $has480 = true;
}
if(file_exists(LCL_HOME . "/videos/" . $id . "/original.mp4")){
    $hasOriginal = true;
}

if($has240 && $has480 && $hasOriginal){
    die("OK");
}else{
    echo("Missing:");
    if(!$has240)
        echo("240\n");
    if(!$has480)
        echo("480n");
    if(!$hasOriginal)
        echo("original\n");
}

?>