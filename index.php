<?php
session_start();
date_default_timezone_set("Asia/Baku");

$r_u = $_SERVER['REQUEST_URI'];

/* load constants and config */
require_once 'config.php';

/* load the model classes */
require_once 'model/modelloader.php';

/* prepare the request */
$request = new Request();

$page = $request->getPage();


function _e($x,$y){
    echo $x;
}
function __($x,$y){
    return $x;
}

/* global variables for layout use in all pages */
$category_map = Category::getMap();

if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
        ob_start("ob_gzhandler");
    else
        ob_start();
require_once 'pages/'.$page.'.php';
?>
