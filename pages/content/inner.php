<?php require_once 'widgets/header.php'; ?>
<?php 
$content = new Content();
$content->loadContent($request->title);
echo "<pre>"; var_dump($content->data);
?>
<?php require_once 'widgets/footer.php'; ?>
