<?php
$videos = Post::getPostsByCategory(35, 3);
?>
<div class="right1 shadow">
    <div class="title">
            <h2>Օրվա տեսանյութ</h2>
    </div>
    <?php
    foreach($videos as $post) {
	Post::isBlue(&$post['name1']);
        
        if($post['image2']) {
            $multi = "class='cont'";
        } else {
            $multi = "";
        }
    ?>
        <div id="gallery">
            <h3><a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><?php echo Post::getPostName($post['name1'], 150); ?>...</a></h3>
            <a <?php echo $multi; ?> href="<?php echo Post::getLink($post['id'], $post['name1']); ?>" title="<?php echo $post['name1']; ?>">
                <div class="active">
                    <img src="<?php echo Post::imageSrc($post['image1'],130,80); ?>" width="212" height="110" alt="" />
                </div>     
                   
                <?php if($post['image2']) { ?>
                    <div class="inactive">
                        <img height="110" width="212" src="<?php echo Post::imageSrc($post['image2'],130,80,true); ?>" alt="<?php echo $post['name1']; ?>" class="thumb_border"  />
                    </div>
                <?php } ?>
                <?php if($post['image3']) { ?>
                    <div class="inactive">
                        <img height="110" width="212" src="<?php echo Post::imageSrc($post['image3'],130,80,true); ?>" alt="<?php echo $post['name1']; ?>" class="thumb_border"  />
                    </div>
                <?php } ?> 
                <span></span>  
            </a>
        </div>
    <?php } ?>
</div>