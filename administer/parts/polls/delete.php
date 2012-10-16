<?php 
if(isset($_GET['id'])){
    Poll::delete($_GET['id']);
}

header('Location: '.ADMIN_URL.'/?part=polls');
exit;
?>