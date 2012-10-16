<?php
/* run the application*/ini_set('session.gc_maxlifetime', 60 * 60 * 6); // 6 Hours 
session_start();
require_once '../config.php';
require_once 'includes/constantloader.php';
require_once 'includes/modelloader.php';


/* controll the request*/

if(isset($_GET['part'])){
    $part = $_GET['part'];
}else{
    $part = 'home';
}

if(isset($_GET['view'])){
    $view = $_GET['view'];
}else{
    $view = 'index';
}

$title = 'News';

/* check the access */
$admin = new Admin();
if($admin->loggedIn()){
    $access = true;
}else{
    $access = true;
}

/* render the layout and page */
if($access){
    require 'parts/'.$part.'/'.$view.'.php'; 
}else{
    require 'parts/home/login.php'; 
}


?>