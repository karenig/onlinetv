<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
$blogs = $db->fetchAll("SELECT * FROM blog");


foreach ($blogs as $blog){
    $blog['title'] = addslashes($blog['title']);
    $blog['krchat'] = addslashes($blog['krchat']);
    $blog['body'] = addslashes($blog['body']);
    $blog['video'] = addslashes($blog['video']);
    $db->insert('node_details', $blog);
}
    
?>
    </body>
</html>
