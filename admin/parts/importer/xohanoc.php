<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
$xohanocs = $db->fetchAll("SELECT * FROM xohanoc");

foreach($xohanocs as $xohanoc) {
    unset($xohanoc['id']);
    unset($xohanoc['name']);
    unset($xohanoc['note']);
    $xohanoc['title'] = addslashes($xohanoc['title']);
    $xohanoc['krchat'] = '';
    $xohanoc['body'] = addslashes($xohanoc['body']);
    $xohanoc['video'] = '';
    $db->insert('node_details', $xohanoc);
}
    
?>
    </body>
</html>
