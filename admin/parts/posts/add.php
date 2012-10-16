<?php 
$post = new Post();
$id = $post->add();
header('Location: '.ADMIN_URL.'/?part=posts&view=edit&fromadd=1&id='.$id);
exit;
?>