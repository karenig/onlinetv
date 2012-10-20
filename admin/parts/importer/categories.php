<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
$xohanocs = $db->fetchAll("SELECT id,title FROM category WHERE parent_id=88");
foreach ($xohanocs as $xohanocs){
    $results[$xohanocs['id']] = $xohanocs['title'];
}
echo "<pre>"; var_dump($results); exit;

foreach ($tv_programs as $tv_program){
    $db->insert('category', array('parent_id' => 67, 'title' => $tv_program['name']));
}
    
?>
    </body>
</html>
