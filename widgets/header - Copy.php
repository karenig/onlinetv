<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head profile="http://gmpg.org/xfn/11">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Free News</title>
        <meta property="og:title" content="<?php echo str_replace("(show blue)", "", $post->data['name1']); ?>" />
        <meta property="og:description" content="<?php echo $post->data['short1']; ?>" />
        <meta property="og:image" content="<?php echo $post->data['image1']; ?>" />
        <meta property="fb:app_id" content="281694191867479" />

        <script type="text/javascript" src="<?php echo ROOT_URL ?>/js/jquery-1.7.1.min.js"></script>	
        <link rel="stylesheet" href="<?php echo ROOT_URL ?>/css/screen.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="<?php echo ROOT_URL ?>/css/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="<?php echo ROOT_URL ?>/css/style.css" type="text/css" media="screen" />
        <link href="http://armeniatv.com/wp-content/themes/armenia_us/images/favicon.png" rel="shortcut icon" />  
		        
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL ?>/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL ?>/css/sliderkit-core.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL ?>/css/fotorama.css" />
        
        <script type="text/javascript" src="<?php echo ROOT_URL ?>/js/jquery.sliderkit.1.9.2.pack.js"></script>
        <script type="text/javascript" src="<?php echo ROOT_URL ?>/js/fotorama.js"></script>
        <script type="text/javascript" src="<?php echo ROOT_URL ?>/js/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="<?php echo ROOT_URL ?>/js/myscripts.js"></script>
        
    </head>
    <body>
    <?php
    $xml = new Xml_Api();
    $rates = $xml->get_rates("http://www.cba.am/_layouts/rssreader.aspx?rss=280F57B8-763C-4EE4-90E0-8136C13E47DA");
//    $weather = $xml->get_weather("http://feeds.feedburner.com/Meteo-TVamWeatherFeed");
    ?>
        
        <div id="header">
        	<div class="wrap">
            	<a href="#"><img src="<?php echo ROOT_URL; ?>/images/logo.jpg" width="495" height="159" alt="" /></a>
                <p style="display:none;" id="root_url"><?php echo ROOT_URL; ?></p>
                <!-- Exanaki & Kursi Block -->
                
                <div class="header_block">
                	<div class="date"><p>Փետրվար 13, 2012</p></div>
               		<div class="header_waver">
            			<h3>Երևան</h3>
                   	 	<p class="night"><span>-5 °C</span>   <span>-10 °C</span></p>
                    	<p class="day"><span>-1 °C</span>   <span>+5 °C</span></p>
                	</div>
           			<div class="header_val">
            			<?php 
                                foreach($rates as $rate) {
                                    echo "<p><span>".$rate." AMD</span></p>";
                                }
                                ?>
            		</div>
                </div>
                
                <!-- End Exanaki & Kursi Block -->
                
                <!-- Social Block -->
                
                <div class="social_block">
                	<a href="http://www.facebook.com/freenews.am" target="_blank"><img src="<?php echo ROOT_URL; ?>/images/facebook.png" width="40" height="40" alt="" /></a>
                	<a href="#"><img src="<?php echo ROOT_URL; ?>/images/twitter.png" width="40" height="40" alt="" /></a>
                    <a href="#"><img src="<?php echo ROOT_URL; ?>/images/feed.png" width="40" height="40" alt="" /></a>
                </div>
                
                <!-- End Social Block -->
                
            </div>
        </div>
        
        <!-- Top Menu -->
        <?php
        if($request->id){
            $menu_item = $request->id;
        }
        ?>
        <div id="nav">
        	<div class="wrap">
            	<ul>
                    <li><a href="<?php echo ROOT_URL; ?>/" class="<?php if($request->isHome()) echo "active_menu"; ?>"><?php _e("Գլխավոր","news"); ?></a></li>
                    <li><a href="<?php echo Category::getLink(5,$category_map); ?>" class="<?php if($request->id == 5) echo "active_menu"; ?>" ><?php _e("Աշխարհում","news"); ?></a></li>
                    <li><a href="<?php echo Category::getLink(4258,$category_map); ?>" class="<?php if($request->id == 4258) echo "active_menu"; ?>" ><?php _e("Հայաստան","news"); ?></a></li>
                    <li><a href="<?php echo Category::getLink(26,$category_map); ?>" class="<?php if($request->id == 26) echo "active_menu"; ?>" ><?php _e("Քրեական","news"); ?></a></li>
                    <li><a href="<?php echo Category::getLink(4261,$category_map); ?>" class="<?php if($request->id == 4261) echo "active_menu"; ?>" ><?php _e("Սպորտ","news"); ?></a></li>
                    <li><a href="<?php echo Category::getLink(4262,$category_map); ?>" class="<?php if($request->id == 4262) echo "active_menu"; ?>" ><?php _e("Մշակույթ","news"); ?></a></li>
                    <li><a href="<?php echo Category::getLink(4259,$category_map); ?>" class="<?php if($request->id == 4259) echo "active_menu"; ?>" ><?php _e("Սփյուռք","news"); ?></a></li>
                    <li><a href="<?php echo Category::getLink(4260,$category_map); ?>" class="<?php if($request->id == 4260) echo "active_menu"; ?>" ><?php _e("Խրոնիկա","news"); ?></a></li>
                </ul>
                <div class="form">
                <form action="" method="get" class="search">
                	<input name="" type="text" placeholder='որոնել' class="search_text" />
                    <input name="" type="submit" value='' class="search_btn"/>
                </form>
                </div>
            </div>
        </div>
        
        <!-- End Top Menu -->
        
        <div id="content">