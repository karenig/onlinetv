<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
$businesses = $db->fetchAll("SELECT * FROM business");


foreach ($businesses as $business){
    unset($business['id']);
    $business['title'] = addslashes($business['title']);
    $business['krchat'] = addslashes($business['krchat']);
    $business['body'] = addslashes($business['body']);
    $business['video'] = addslashes($business['video']);
    $db->insert('node_details', $business);
}
    
?>
    </body>
</html>
