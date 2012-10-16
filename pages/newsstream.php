<?php require_once 'widgets/header.php'; ?>
<script type="text/javascript" src="<?php echo ROOT_URL ?>/js/main.js"></script>		
<div class="span-24" id="contentwrap">
    <div class="span-13">
        <div id="content">
            <div style="width: 650px; float:left;">
                <?php
                if($request->page){
                    $page = $request->page;
                }else{
                    $page = 1;
                }
                $posts = Post::getPostsByCategories(Category::$all,15,$page);
                $i = 0;
                foreach($posts as $post) { 
					Post::isBlue(&$post['name1']);
                    $i++;
                    if($i>=15){
                        $next = true;
                    }else{
                        ?>
                        <div id="post-<?php echo $post['id']; ?>" style="clear:both; margin-top:10px;">
                            <div class="entry">
                                <?php   if(!empty($post['image1']))  {   ?>
                                    <a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>" rel="bookmark" title="<?php echo $post['name1']; ?>">
                                        <img width="125" height="95" style="float: left; margin-right: 10px" src="<?php echo Post::imageSrc($post['image1'],125,95); ?>" alt="<?php echo $post['name1']; ?>" class="thumb_border"  />
                                    </a>
                                <?php   }   ?>
                                <h2 class="title_news"><a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>" rel="bookmark" title="<?php echo $post['name1']; ?>"><?php echo $post['name1']; ?></a></h2>
                                <div class="postdate"><?php echo Post::date($post['date']); ?></div>
                                <a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>" style="text-decoration: none"><?php echo Post::getPostName($post['short1'], 250); ?></a>
                            </div>
                            <div class="postmeta"></div>
                            <div class="readmorecontent">
                                <a class="readmore" href="<?php echo Post::getLink($post['id'], $post['name1']); ?>" rel="bookmark" title="<?php echo $post['name1']; ?>"><?php _e("Կարդալ ավելին","news"); ?> &raquo;</a>
                            </div>
                        </div>
                        <br/>
                    <?php 
                    }
                } ?>
				<br clear="all"/>
                <div class="fl">
                    <?php if($page > 1){ ?>
                    <a href="<?php echo ROOT_URL.'/newsstream/page/'.($page-1) ?>">
                        <?php echo '&laquo; '; _e('Նախորդ նորությունները','news');?>
                    </a>
                    <?php } ?>
                </div>
                <div class="fr">
                    <?php if($next){ ?>
                    <a href="<?php echo ROOT_URL.'/newsstream/page/'.($page+1) ?>">
                        <?php echo  _e('Հաջորդ նորությունները','news'); echo ' &raquo;'; ?>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="span-11_more" style="padding-top:15px;"><?php require_once 'widgets/rightpart.php'; ?></div>
        </div>
    </div>
</div>
<?php require_once 'widgets/footer.php'; ?>