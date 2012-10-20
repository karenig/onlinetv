<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
$serials = $db->fetchAll("SELECT * FROM serial");


foreach($serials as $serial) {
    unset($serial['id']);
    unset($serial['name']);
    $serial['title'] = addslashes($serial['title']);
    $serial['krchat'] = '';
    $serial['body'] = addslashes($serial['body']);
    $serial['video'] = '';
    $db->insert('node_details', $serial);
}
    
?>
    </body>
</html>
