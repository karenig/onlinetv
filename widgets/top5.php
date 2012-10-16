<?php
    $tops = Post::getPostsByCategory(4263, 5);
?>			
<div class="left2 shadow">
    <div class="title">
            <h2>Այսօրվա TOP 5</h2>
    </div>
    <?php if(!empty($tops)) { 
        foreach($tops as $post) { 
            Post::isBlue(&$post['name1']);
    ?>
            <div>
                <h3><a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><?php echo $post['name1']; ?></a></h3>
                <p><a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><?php echo $post['short1']; ?> ...</a></p>
            </div>
        <?php } ?>   
    <?php } ?>
</div>