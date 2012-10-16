<?php
    $news = Post::getPostsByCategories(Category::$all,10);
?>
<div class="middle1 shadow">
    <div class="title">
            <h2>Լրահոս</h2>
    </div>
    <?php foreach($news as $post) { ?>
        <div>
            <p>
                <span><?php echo Post::date($post['date'], true); ?> -</span>
                <a href="<?php echo Post::getLink($post['id'], $post['name1']); ?>"> <?php echo $post['name1']; ?> </a>
            </p>
        </div>
    <?php } ?>
</div>