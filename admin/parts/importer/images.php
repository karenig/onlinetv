<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"> 

    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>Iguan CMS Admin Panel</title> 

    </head> 

    <body> 
<?php
$db = new Db();
$images = $db->fetchAll("SELECT * FROM wp_posts WHERE post_type='attachment' AND post_parent!='0' LIMIT 30001,15000");
echo count($images);
foreach ($images as $image){
    $id = $image['ID'];
    $parent = $image['post_parent'];
    $post = $db->fetchOne("SELECT * FROM post WHERE id='$parent'");
    $url = str_replace("localhost/news", "news.armeniatv.com", $image['guid']);
    if($post){
        if($post['image1'] == ''){
            $db->update('post', array('image1'=>$url), "id='$parent'");
        }elseif($post['image2'] == ''){
            $db->update('post', array('image2'=>$url), "id='$parent'");
        }elseif($post['image3'] == ''){
            $db->update('post', array('image3'=>$url), "id='$parent'");
        }else{
            
        }
    }
    
}
    
?>
    </body>
</html>
