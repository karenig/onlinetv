<?php
    $category_map = Category::getMap();
    $categories = Category::$home;
    $count = 3;
?>    
<div class="left4 shadow">
    <ul id="mycarousel" class="jcarousel-skin-tango">
        <?php foreach ($categories as $c){ ?>
            <li>
                <div class="carusel_item">
                <div class="title"><h2><?php echo $category_map[$c]['name1']; ?></h2></div>
                    <?php $news = Post::getPostsByCategory($c,$count); ?>
                    <?php foreach ($news as $post) { ?>
                        <div class="b1_item">
                            <a href="#"><img src="<?php echo Post::imageSrc($post['image1'],125,95); ?>" width="130" height="82" alt="" /></a>
                            <h3><a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><?php echo $post['name1']; ?></a></h3>
                            <p><a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><?php echo Post::getPostName($post['short1'], 120); ?>... </a></p>
                         </div>
                     <?php } ?>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>    
       
            