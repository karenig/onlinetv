<?php
$db = new Db();
$id = $_GET['id'];
if(!$id){
    exit;
}

$root_dir = ROOT_DIR.'/uploads/multi/'.$id.'/';
$root_href = ROOT_URL.'/uploads/multi';


$name= $_POST['image'];
$url = $root_href.'/'.$id.'/'.$name;

$post = $db->fetchOne("SELECT * FROM post_details WHERE id = '$id'");

if($post['images'] == ''){
	$images = array();
}else{
	$images = unserialize($post['images']);
	if(!is_array($images)){
		$images = array();
	}
}
foreach($images as $key=>$image){
	if($image == $url){
		unset($images[$key]);
	}
}

$images = serialize($images);

$db->update('post_details',array('images'=>$images),"id = '$id'");

unlink($root_dir.'/'.$name);
?>
