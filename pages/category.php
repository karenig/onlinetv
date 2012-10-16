<?php require_once 'widgets/header.php'; ?>
    <div class="left_middle">
        <div class="top_gov shadow">
             <a href="#"><img src="<?php echo ROOT_URL ?>/images/govazd_top.jpg" width="698" height="80" alt="" /></a>
        </div>
        <div class="all shadow">
                <div class="title">
                        <h2>Բոլոր լուրերը</h2>
                </div>
                    <?php
                    if($request->page){
                        $page = $request->page;
                    }else{
                        $page = 1;
                    }
                    $posts = Post::getPostsByCategory($request->id,15,$page);
                    $i = 0;
                    foreach($posts as $post) {				
                        $i++;
                        if($i>=15){
                            $next = true;
                        }else{
                            ?>
                            <div class="all_item">
                                <a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><img src="<?php echo Post::imageSrc($post['image1'],125,95); ?>" width="125" height="95" alt="" /></a>
                                <span><?php echo Post::date($post['date']); ?></span>
                                        <h3><a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><?php echo $post['name1']; ?></a></h3>
                                <p><a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><?php echo $post['short1']; ?>... </a></p>
                            </div>
                        <?php 
                        }
                    } ?>

                    <div class="all_more">
                        <?php if($page > 1){ ?>
                        <a href="<?php echo Category::getLink($request->id, $category_map).'/page/'.($page-1) ?>">
                            <?php echo '&laquo; '; _e('Նախորդը','news');?>
                        </a>
                        <?php } ?>

                        <?php if($next){ ?>
                        <a href="<?php echo Category::getLink($request->id, $category_map).'/page/'.($page+1) ?>">
                            <?php echo  _e('Հաջորդը','news'); echo ' &raquo;'; ?>
                        </a>
                        <?php } ?>
                    </div>

           </div>
       </div> 
    
       <div class="right">
            <!-- Orva Tesanyut -->
            <?php include'widgets/videos.php';?>    
            <!-- End Orva Tesanyut -->

            <!-- Right Banner -->
            <div class="right2 shadow">
        	<div>
            	<a href="#"><img src="<?php echo ROOT_URL; ?>/images/govazd.jpg" width="212" height="300" alt="" /></a>
          	</div>
            </div>
        <!-- End Right Banner -->
        
	</div>

<?php require_once 'widgets/footer.php'; ?>