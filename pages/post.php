<?php 

/* Iguan Cache - stable caching logic - must be copied to each part - logic must be from data.php */
$nofile_error_handler = set_error_handler("noFile");
$cache_api = new Iguan_Cache();

//echo ROOT_DIRECTORYECTORY;

function noFile($errno, $errstr, $errfile, $errline) {
    global $cache_api;
	global $request;

    if ($errno == 2) {
		$post = new Post();
		$post->loadPost($request->id);
		$cache_api->data = $post->data;
		$cache_api->details = $post->details;
		$cache_api->categories = $post->categories;
		$cache_api->related = Post::getPostsByCategories($post->categories,5);
		$data = $cache_api->getDataSerialized();
        if ($data != '') {
            $contents = '<?php
                $cache_data = "' . $data . '";
            ?>';
            $fp = @fopen(ROOT_DIRECTORY . '/cache/' . $request->id . '.php', "w+");
            @fwrite($fp, $contents);
        }
    }else{
		//echo $errstr.' - '.$errfile.'-'.$errline;
	}
}

include_once ROOT_DIRECTORY . '/cache/' . $request->id . '.php';

if (is_string($cache_data)) {
	$cache_api->loadData($cache_data);
}
$post->data = $cache_api->data;
$post->details = $cache_api->details;
$posts = $cache_api->related;
$post->id = $request->id;


/* end of stable cache logic */
require_once 'widgets/header.php'; 
    Post::isBlue(&$post->data['name1']);
?>
    <div class="left_middle">
        <div class="top_gov shadow">
                <a href="#"><img src="<?php echo ROOT_URL ?>/images/govazd_top.jpg" width="698" height="80" alt="" /></a>
        </div>
        
        <div class="view shadow">
                <div class="view_title">
                    <span><?php echo Post::date($post->data['date']); ?></span>
                    <h2><?php echo $post->data['name1']; ?></h2>
                </div>
                <div class="view_item">
                    <?php echo $post->details['description1']; ?>
                </div>
            
            <div class="postmeta clear" style="padding-top:10px">	
                <?php $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>
               <div style="float:left;">
               <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo $url; ?>&amp;layout=button_count&amp;show_faces=true&amp;width=300&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:85px; height:21px;"></iframe>
               </div>
               <!-- AddThis Button BEGIN -->
               <div class="addthis_toolbox addthis_default_style">
                    <a style="color: #0069AC" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4d650d3c715d702e" class="addthis_button_compact">Share</a>
                    <a class="addthis_button_preferred_1"></a>
                    <a class="addthis_button_preferred_2"></a>
                    <a class="addthis_button_preferred_3"></a>
                    <a class="addthis_button_preferred_4"></a>
               </div>
               <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4d650d3c715d702e"></script>
               <div style="float: right; margin-right: 128px; margin-top: -19px; color: #b10000;" align="center">
                    <span style="color:#b10000;"><?php echo "Դիտումներ: "; ?></span><span style="color:#b10000;" video="<?php echo $post->id; ?>" id="post_view"></span>
               </div>
            </div>
            
        <div id="fb-root"></div>
        <div style="position: relative; margin-top: 10px;">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/hy_AM/all.js#xfbml=1&appId=281694191867479";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        <div class="fb-comments" data-href="http://www.news.armeniatv.com/post/id/<?php echo $post->id; ?>" data-num-posts="10" data-width="600"></div>
        <div style="position: absolute; height: 18px; width: 600px; bottom: 0px; background: #ffffff;"></div>
        </div>
            

       <!-- View Slider --> 
        <?php if(!empty($post->details['images'])) { ?>
            <div id="my-fotorama" class="fotorama" data-width="499" data-height="333">
                 <?php foreach($post->details['images'] as $img){ ?>
                        <a href="<?php echo $img; ?>"><img src="<?php echo $img; ?>" width="72s" height="48" /></a>
                 <?php } ?>                       
            </div>
       <?php } ?>

        <!-- End View Slider -->

        <!-- View Youtube --> 

        <div style="clear:both;">
            <?php
            if(!empty($post->details['videos']))  { 
                    echo $post->details['videos'];
            }   
            ?>
        </div>

        <!-- End View Youtube --> 
            
        </div>
        
        <div class="view shadow">
            <div class="view_title">
                <h2>ՀԱՐԱԿԻՑ ԼՈՒՐԵՐ</h2>
            </div>
            <?php
            foreach($posts as $p){
                Post::isBlue(&$p['name1']);
                if($p['id'] == $post->id){
                    continue;
                }
            ?>
                <div class="all_item">
                    <a href="<?php echo Post::getLink($p['id'], $p['name1']); ?>"><img src="<?php echo Post::imageSrc($p['image1'],125,95); ?>" width="125" height="95" alt="" /></a>
                    <span><?php echo Post::date($p['date']); ?></span>
                    <h3><a href="<?php echo Post::getLink($p['id'], $p['name1']); ?>"><?php echo $p['name1']; ?></a></h3>
                    <p><a href="<?php echo Post::getLink($p['id'], $p['name1']); ?>"><?php echo Post::getPostName($p['short1'], 250); ?>... </a></p>
                </div>
            <?php } ?>
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