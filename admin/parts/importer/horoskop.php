<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
$horoskops = $db->fetchAll("SELECT * FROM horoskop");


foreach ($horoskops as $horoskop){
    unset($horoskop['id']);
    unset($horoskop['name']);
    unset($horoskop['xname']);
    unset($horoskop['number']);
    $horoskop['title'] = addslashes($horoskop['title']);
    $horoskop['krchat'] = addslashes($horoskop['krchat']);
    $horoskop['body'] = addslashes($horoskop['body']);
    $horoskop['video'] = '';
    $db->insert('node_details', $horoskop);
}
    
?>
    </body>
</html>
