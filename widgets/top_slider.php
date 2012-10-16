<?php
    $featured = Post::getPostsByCategory(29, 4);
?>
<div class="left1 shadow">
<div class="sliderkit newslider-vertical">
                        <div class="sliderkit-panels">
                            <?php 
                            foreach($featured as $post) { 
				Post::isBlue(&$post['name1']);
                            ?>
                                <div class="sliderkit-panel">
                                    <div class="sliderkit-news">
                                        <a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><img src="<?php echo Post::imageSrc($post['image1'],300,200); ?>" width="300" height="240" alt="<?php echo $post['name1']; ?>" /><span>
                                        <h3><?php echo $post['name1']; ?></h3><p><?php echo $post['short1']; ?> ...</p></span></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="sliderkit-nav">
                                <div class="sliderkit-nav-clip">
                                        <ul>
                                            <?php 
                                            foreach($featured as $post) { 
                                                Post::isBlue(&$post['name1']);
                                            ?>
                                                <li>
                                                    <a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><h3><?php echo $post['name1']; ?></h3>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                </div>
                        </div>
                </div>
</div>