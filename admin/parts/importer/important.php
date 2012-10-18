<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
$importants = $db->fetchAll("SELECT * FROM important");


foreach ($importants as $important){
    unset($important['id']);
    unset($important['banner_title']);
    $important['title'] = addslashes($important['title']);
    $important['krchat'] = addslashes($important['krchat']);
    $important['body'] = addslashes($important['body']);
    $important['video'] = '';
    $db->insert('node_details', $important);
}
    
?>
    </body>
</html>

