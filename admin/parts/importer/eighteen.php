<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
$eighteens = $db->fetchAll("SELECT * FROM eighteen");


foreach ($eighteens as $eighteen){
    unset($eighteen['id']);
    $eighteen['title'] = addslashes($eighteen['title']);
    $eighteen['krchat'] = addslashes($eighteen['krchat']);
    $eighteen['body'] = addslashes($eighteen['body']);
    $eighteen['video'] = addslashes($eighteen['video']);
    $db->insert('node_details', $eighteen);
}
    
?>
    </body>
</html>
