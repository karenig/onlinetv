<?php
$ids = $_POST["ids"];
$ids_array = explode(',', $ids);
$views = 'Դիտումներ: ';

$posts = Post::getPostsByIds($ids,count($ids_array));

 foreach($posts as $key=>$item) { 
	Post::isBlue(&$item['name1']);
	?>     
    <a href="<?php Post::getLink($item['id'],$item['name1']); ?>" class="newsfeed_a" style="border-bottom: 1px dashed #E1E1E1; padding-bottom:6px;"><?php echo $item['name1']; ?></a>
    <span style="color:#0069ac;"><?php echo $views; ?></span><span style="color:#0069ac;" id="most_video<?php echo $item['id'] ?>"></span>
	<?php 
} ?>
