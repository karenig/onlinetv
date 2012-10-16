<?php
session_start();
require_once 'config.php';
require_once ROOT_DIRECTORY.'/model/modelloader.php';

$action = $_POST['action'];
if(!$action){
    $action = 'index';
}
require_once 'ajax/'.$action.'.php';
?>