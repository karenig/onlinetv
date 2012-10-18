<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();

/*$db->update('node', array('type' => 40), "type='blog'");
$db->update('node', array('type' => 9), "type='business'");
$db->update('node', array('type' => 29), "type='eighteen'");
$db->update('node', array('type' => 41), "type='important_news'");
$db->update('node', array('type' => 12), "type='interetsing'");*/

////////////////////////////////////////////////////// NEWS PART ////////////////////////////////////////////////////
/*$newsArray = array(
    '2' => 'Հասարակություն', 
    '3' => 'Քաղաքականություն', 
    '5' => 'Միջազգային', 
    '4' => 'Տնտեսություն', 
    '11' => 'LifeNews',
    '6' => 'Պատահարներ',
    '42' => 'Առողջապահություն',
    '10' => 'Սպորտ',
    '13' => 'Մամուլի տեսություն',
    '8' => 'Գիտություն',
    '7' => 'Կրթություն',
    '43' => 'Մշակույթ'
);

foreach($newsArray as $key=>$value) {
    $posts = $db->fetchAll("SELECT nid FROM news WHERE name='".$value."'");
    foreach($posts as $post) {
        $id = (int)$post['nid'];
        $db->update('node', array('type' => $key), "nid=$id");
    }
}*/
?>
    </body>
</html>

