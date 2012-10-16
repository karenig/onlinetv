<?php
$error = false;
if(isset($_POST['ok'])){
    $admin = new Admin();
    
    $login = $_POST['login'];
    $pass = $_POST['password'];
	
    if($admin->login($login,$pass)){
        header("Location: ".ADMIN_URL."/");
    }else{
        $error = true;
    }
}
?>
<!DOCTYPE html>
 
<html xmlns="http://www.w3.org/1999/xhtml"> 
 
<head> 
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
	<title>Login | Iguan CMS</title> 
	
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL; ?>/css/style.css" />
        <script language="javascript" type="text/javascript" src="<?php echo ADMIN_URL; ?>/js/niceforms.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo ADMIN_URL; ?>/css/niceforms-default.css" />
</head> 
 
<body> 
    <div id="main_container">
        <div class="header_login">
            <div class="logo"><a href="#"><img src="<?php echo ADMIN_URL; ?>/images/logo.png" alt="" title="" border="0" /></a></div>
        </div>
        
         <div class="login_form">
         
         <h3>Admin Panel Login</h3>
         
         <a href="#" class="forgot_pass">Forgot password</a> 
         
         <form action="<?php echo ADMIN_URL ?>/" method="post" class="niceform">
         
                <fieldset>
                    <dl>
                        <dd><?php if($error){ ?>
                                    <h3 style="color: red">Access denied</h3>
                                <?php } ?></dd>
                    </dl>
                    <dl>
                        <dt><label for="email">Username:</label></dt>
                        <dd><input type="text" name="login" id="" size="54" <?php if(isset($login)){ ?>value="<?php echo $login ?>"<?php } ?> /></dd>
                    </dl>
                    <dl>
                        <dt><label for="password">Password:</label></dt>
                        <dd><input type="password" name="password" id="" size="54" /></dd>
                    </dl>
                    
                     <dl class="submit">
                    <input type="submit" name="ok" id="submit" value="Login" />
                     </dl>
                    
                </fieldset>
                
         </form>
         </div>  
          
	
    
    <div class="footer_login">
    
    	<div class="left_footer_login">&copy; 2010-11 Copyright <a href="http://iguansystems.com">Iguan Systems</a>. Powered by PHP :)</div>
    
    </div>

</div>	

</body> 
 
</html>