<?php
$mamul_posts = Post::getPostsByCategory(41, 5);
?>
<div class="c2 shadow">
    <div class="title">
            <h2>Մամուլի տեսություն</h2>
    </div>
    <ul class="mamul">
        <?php foreach($mamul_posts as $post) { ?>
            <li><a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"><?php echo $post['name1']; ?></a></li>
        <?php } ?>
    </ul>
</div>