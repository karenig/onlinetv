<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
//$db->update('node', array('type' => 40), "type='blog'");
$db->update('node', array('type' => 9), "type='business'");

    
?>
    </body>
</html>

