<?php 
$post = new Post();
if(isset($_GET['id'])){
    Post::approve($_GET['id']);
}

header('Location: '.ADMIN_URL.'/?part=posts');
exit;
?>