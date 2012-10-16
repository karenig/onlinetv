<?php 
$post = new Post();
if(isset($_GET['id'])){
    Post::unapprove($_GET['id']);
}

header('Location: '.ADMIN_URL.'/?part=posts');
exit;
?>