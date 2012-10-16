<?php 
$photos = Post::getPostsByCategory(32, 1); 
?>
<div class="middle3 shadow">
    <div class="title">
            <h2>Օրվա ֆոտո</h2>
    </div>
    <?php if(!empty($photos)) { ?>
        <div>
            <a href="<?php echo Post::getLink($photos[0]['id'], $photos[0]['name1']); ?>"><img src="<?php echo Post::imageSrc($photos[0]['image1'],125,95); ?>" width="210" height="135" alt="" /></a>
            <h3><a href="<?php echo Post::getLink($photos[0]['id'], $photos[0]['name1']); ?>"><?php echo $photos[0]['name1']; ?></a></h3>
        </div>
    <?php } ?>
</div>