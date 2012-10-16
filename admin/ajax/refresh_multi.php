<?php
$db = new Db();
$id = $_GET['id'];
if(!$id){
    exit;
}
$post = $db->fetchOne("SELECT * FROM post_details WHERE id = '$id'");

if($post['images'] == ''){
	$images = array();
}else{
	$images = unserialize($post['images']);
	if(!is_array($images)){
		$images = array();
	}
}

foreach($images as $img){
	$rand = 'mi'.md5($img);
	?>
	<div id="<?php echo $rand ?>">
		<img src="<?php echo $img; ?>" />&nbsp;
		<b onclick="deleteMultiImage('<?php echo str_replace(ROOT_URL.'/uploads/multi/'.$id.'/','',$img); ?>','<?php echo $rand; ?>')" style="color: #900; cursor: pointer">Delete</b>
	</div>
	<?php 
}

?>
