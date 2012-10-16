<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"> 

    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>Iguan CMS Admin Panel</title> 

    </head> 

    <body> 
<?php
$db = new Db();
$posts = $db->fetchAll("SELECT *,post.id as okid FROM post JOIN `wp_term_relationships` as tr ON post.id = tr.object_id JOIN wp_term_taxonomy as tt ON tt.term_taxonomy_id = tr.term_taxonomy_id RIGHT JOIN wp_terms as t ON t.term_id = tt.term_id WHERE tt.taxonomy = 'category'");

foreach ($posts as $p){
    $id = $p['okid'];
    $cat = $p['term_id'];
    if($cat != 1 && $p['okid']){
        $post = $db->fetchOne("SELECT * FROM post WHERE id='$id'");
        if($post){
            if($post['cat1'] == 0){
                $db->update('post', array('cat1'=>$cat), "id='$id'");
            }elseif($post['cat2'] == 0){
                $db->update('post', array('cat2'=>$cat), "id='$id'");
            }elseif($post['cat3'] == 0){
                $db->update('post', array('cat3'=>$cat), "id='$id'");
            }else{

            }
        }
    }
}
    
?>
    </body>
</html>
