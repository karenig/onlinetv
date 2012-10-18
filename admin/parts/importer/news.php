<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
$news = $db->fetchAll("SELECT * FROM news");


foreach ($news as $n){
    unset($n['id']);
    unset($n['name']);
    $n['title'] = addslashes($n['title']);
    $n['krchat'] = addslashes($n['krchat']);
    $n['body'] = addslashes($n['body']);
    $n['video'] = addslashes($n['video']);
    $db->insert('node_details', $n);
}
    
?>
    </body>
</html>

