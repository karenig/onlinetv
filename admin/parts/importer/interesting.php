<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
$interestings = $db->fetchAll("SELECT * FROM interesting");


foreach ($interestings as $interesting){
    unset($interesting['id']);
    $interesting['title'] = addslashes($interesting['title']);
    $interesting['krchat'] = addslashes($interesting['krchat']);
    $interesting['body'] = addslashes($interesting['body']);
    $interesting['video'] = addslashes($interesting['video']);
    $db->insert('node_details', $interesting);
}
    
?>
    </body>
</html>

