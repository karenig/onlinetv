<?php
$db = new Db();
$id = $_GET['id'];
if(!$id){
    exit;
}
$image = $_GET['image'];
$post = $db->fetchOne("SELECT * FROM post WHERE id = '$id'");
$url = $post[$image];
$url = explode('/', $url);
$image_name = array_pop($url);

/* parsing name $image_name */
$sizes = array(
    array(130,80),
    array(300,200),
    array(125, 95),
    array(180, 130),
    array(82, 50),
);
$root_dir = ROOT_DIR.'/uploads/post_main_images/'.$id;

unlink($root_dir.'/'.$image_name);
foreach ($sizes as $size){
    $image_current = addSizes($image_name,$size[0],$size[1]);
    unlink($root_dir.'/'.$image_current);
}


        
function addSizes($image,$width,$height){
    $parts = explode('.',$image);
    $ext = array_pop($parts);
    $image = implode('.', $parts)."-$width".'x'."$height.$ext";
    return $image;
}

$db->update('post', array($_GET['image']=>''), 'id="'.$_GET['id'].'"');

?>
