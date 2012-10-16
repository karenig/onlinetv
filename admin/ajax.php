<?php
session_start();
require_once 'includes/class.upload.php';
require_once 'includes/modelloader.php';
require_once 'includes/constantloader.php';
require_once '../config.php';
$root_dir = ROOT_DIR.'/uploads/post_images';
$root_href = ROOT_URL.'/uploads/post_images';

$action = $_GET['action'];
if(!$action){
    $action = 'index';
}

require_once (ADMIN_DIR.'/ajax/'.$action.'.php');
?>