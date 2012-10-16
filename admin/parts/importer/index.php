<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"> 

    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>Iguan CMS Admin Panel</title> 

    </head> 

    <body> 
<?php
$db = new Db();
$posts = $db->fetchAll("SELECT * FROM wp_posts WHERE post_type='post' AND post_status='publish'");

foreach ($posts as $p){
    $id = $p['ID'];
    $name = $p['post_name'];
    $short = $p['post_excerpt'];
    $date = $p['post_date'];
    $name = $p['post_title'];
    $description = $p['post_content'];//str_replace("localhost/news", "news.armeniatv.com", $p['post_content']);
    $author_id = rand(1,4);
    
    $description_stipped = strip_tags($description);
    if($short == '' && $description_stipped != ''){
        $words = explode(' ', $description_stipped);
        if(count($words > 25)){
            for($j=0;$j<=25;$j++){
                $short .= $words[$j].' ';
            }
        }else{
            $short = $description_stipped;
        }
    }
    $name = addslashes($name);
    $description = addslashes($description);
    $short = addslashes($short);
    
    $sql = "INSERT INTO  `post` 
        (  
            `id` ,  `name1` ,  `name2` ,  `name3` ,
            `date` ,  `author_id` ,  `short1` ,
            `short2` ,  `short3` ,  `image1` ,
            `image2` ,  `image3` ,  `is_draft` ,
            `cat1` , `cat2` ,  `cat3` ,  `is_approved` 
        ) 
        VALUES (
        '$id' ,  '$name',  '',  '', 
        '$date' ,  '$author_id',  '$short',  
        '',  '',  '',
        '',  '',  '0',  
        '0',  '0',  '0',  '1'
        );";
    $db->db->execute($sql);
    $sql = "INSERT INTO  `post_details` (  `id` ,  `description1` ,  `description2` ,  `description3` ) 
        VALUES (
        '$id',  '$description',  '',  ''
    );";
    $db->db->execute($sql);
}
    
?>
    </body>
</html>
