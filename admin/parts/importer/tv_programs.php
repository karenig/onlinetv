<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
$tv_programs = $db->fetchAll("SELECT * FROM tv_programs");

foreach($tv_programs as $tv_program) {
    unset($tv_program['id']);
    unset($tv_program['name']);
    $tv_program['title'] = addslashes($tv_program['title']);
    $tv_program['krchat'] = '';
    $tv_program['body'] = addslashes($tv_program['body']);
    $tv_program['video'] = '';
    $db->insert('node_details', $tv_program);
}
    
?>
    </body>
</html>
