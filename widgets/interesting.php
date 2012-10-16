<?php 
$interesting = Post::getPostsByCategory(4264, 1); 
?>		
<div class="middle2 shadow">
    <div class="title">
            <h2>Հետաքրքիր</h2>
    </div>
    <?php if(!empty($interesting)) { ?>
        <div class="middle2_wrap">
                <a href="#"><img src="<?php echo Post::imageSrc($interesting[0]['image1'],125,95); ?>" width="125" height="95" alt="" /></a>
            <h3><a href="#"><?php echo $interesting[0]['name1']; ?></a></h3>
            <p><a href="#"><?php echo $interesting[0]['short1']; ?> ...</a></p>
        </div>
    <?php } ?>
</div>