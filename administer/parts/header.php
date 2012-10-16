<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"> 

    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>Iguan CMS Admin Panel | <?php echo $title ?></title> 
		
        <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/reset.css" type="text/css" media="screen" title="no title" />
        <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/text.css" type="text/css" media="screen" title="no title" />
        <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/form.css" type="text/css" media="screen" title="no title" />
        <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/buttons.css" type="text/css" media="screen" title="no title" />
        <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/grid.css" type="text/css" media="screen" title="no title" />	
        <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/layout.css" type="text/css" media="screen" title="no title" />	

        <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/ui-darkness/jquery-ui-1.8.12.custom.css" type="text/css" media="screen" title="no title" />
        <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/plugin/jquery.visualize.css" type="text/css" media="screen" title="no title" />
        <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/plugin/uniform.default.css" type="text/css" media="screen" title="no title" />
        <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/plugin/dataTables.css" type="text/css" media="screen" title="no title" />

        <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/custom.css" type="text/css" media="screen" title="no title">
        <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/style.css" type="text/css" media="screen" title="no title">
	<script type="text/javascript" src="<?php echo ADMIN_URL ?>/js/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="<?php echo ADMIN_URL ?>/js/nicEdit.js" ></script>
        <script type="text/javascript" src="<?php echo ADMIN_URL ?>/js/datepicker.js"></script>
        <script type="text/javascript" src="<?php echo ADMIN_URL ?>/js/admin.js"></script>
        <script type="text/javascript">
           $(function() {
                $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
           });
        </script>

    </head> 

<body> 
	<div id="main_container">
		<div class="header">
    		<div class="logo"><a href="#"><img src="images/logo.png" alt="" title="" border="0" style="margin-top:-25px;"/></a></div>
    		<div class="right_header">Welcome Admin, <a href="#">Visit site</a> | <a href="#" class="messages">(3) Messages</a> | <a href="<?php echo ADMIN_URL ?>/?part=home&view=logout" class="logout">Logout</a></div>
    	</div>
        <div class="main_content">
        	<div class="menu">
                    <ul>
                        <li><a href="<?php echo ADMIN_URL ?>" class="<?php if(Admin::is_home()) echo "current"; ?>" >Home</a></li>
                        <li><a href="<?php echo ADMIN_URL ?>?part=posts" class="<?php if($_GET["part"] == 'posts') echo "current"; ?>" >Posts</a>
                           <ul>
                                <li><a href="<?php echo ADMIN_URL ?>?part=posts&view=add">Add new post</a></li>	
                                <li><a href="<?php echo ADMIN_URL ?>?part=posts">Posts</a></li>	
                           </ul>
                        </li>
                    	<li><a href="<?php echo ADMIN_URL ?>?part=polls" class="<?php if($_GET["part"] == 'polls') echo "current"; ?>">Polls</a>
                           <ul>
                                <li><a href="<?php echo ADMIN_URL ?>?part=polls&view=add">Add new poll</a></li>	
                                <li><a href="<?php echo ADMIN_URL ?>?part=polls">Polls</a></li>	
                           </ul>
			</li>			
                                                
<!--                        <li><a href="<?php //echo ADMIN_URL ?>">Moderation</a></li>-->
<!--                        <li><a href="<?php //echo ADMIN_URL ?>">Users</a></li>-->
                    </ul>
             </div>
             
            
            
            

            