<?php
$most_vieweds = Post::getMostViewed(4);
?>			
<div class="c1 shadow">
	<div class="title">
    	<h2>Ամենաշատ ընթերցված</h2>
    </div>
        <?php 
            foreach($videos as $post) {
               Post::isBlue(&$post['name1']);
        ?>
            <div class="c1_item">
            	<a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><img src="<?php echo Post::imageSrc($post['image1'],125,95); ?>" width="85" height="50" alt="" /></a>
                <h3><a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><?php echo Post::getPostName($post['name1'], 210); ?>...</a></h3>
            	<!--<p><a href="#">Տեքստ տեքստ տեքստ տեքստ տեքստ տեքստ տեքստ տեքստ... </a></p>-->
            </div>
         <?php } ?>              
</div>