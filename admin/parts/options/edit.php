<?php 
$post = new Post();

/*if(isset($_POST['Save'])){
    
    $post->id = $_GET['id'];
    /*main data*/
    $post->data['author_id'] = 0;/* @todo author */
    $post->data['short1'] = $_POST['short1'];
    $post->data['short2'] = $_POST['short2'];
    $post->data['short3'] = $_POST['short3'];
	//$post->data['date'] = Post::get_date_from_data($_POST['date'], $_POST['hour'], $_POST['minute']);
	$post->data['date'] = strtotime(Post::get_date_from_data($_POST['date'], $_POST['hour'], $_POST['minute']));
    
    
    /*post_details*/
    $post->details['description1'] = $_POST['description1'];
    $post->details['description2'] = $_POST['description2'];
    $post->details['description3'] = $_POST['description3'];
	$post->details['videos'] = $_POST['videos'];
    
    if(!$post->isFull()){
        $post->data['is_draft'] = 1;
        $post->data['is_approved'] = 0;
        $error = true;
    }else{
        $post->data['is_draft'] = 0;
        //$post->data['is_approved'] = 1;
    }
	
    $post->save();
	$post->loadPost($_GET['id']);
	
	
}else{
    $post->loadPost($_GET['id']);
    if(!$post->isFull()){
        $post->data['is_draft'] = 1;
        $error = true;
    }
}*/

require_once 'parts/header.php';
?>
<div id="masthead">
    <div class="content_pad">

        <h1 class="no_breadcrumbs">Edit options</h1>

        <div id="search">
            
        </div> <!-- #search -->

    </div> <!-- .content_pad -->
    
</div> <!-- #masthead -->
<div id="content" class="xgrid">

    <div class="x12">

        <?php if($error){ ?>
            <h2 style="color: red">Please fill the data carefully!!!</h2>
        <?php } ?>
		<form action="<?php echo ADMIN_URL ?>/?part=posts&view=edit&id=<?php echo $post->id ?>" method="post" enctype="multipart/form-data" class="form label-inline uniform">
		<div id="tabs-1">
			<div class="field"><label for="usd" style="width:76px">USD:</label> <input id="usd" name="usd" size="50" type="text" class="medium" value="<?php echo $post->data['name1'] ?>" /></div>
			<div class="field"><label for="euro" style="width:76px">EURO:</label> <input id="euro" name="euro" size="50" type="text" class="medium" value="<?php echo $post->data['name2'] ?>" /></div>
			<div class="field"><label for="rub" style="width:76px">RUB:</label> <input id="rub" name="rub" size="50" type="text" class="medium" value="<?php echo $post->data['name3'] ?>" /></div>
			<div class="field"><label for="gold" style="width:76px">GOLD:</label> <input id="gold" name="gold" size="50" type="text" class="medium" value="<?php echo $post->data['name3'] ?>" /></div>
			<div class="field"><label for="petrol" style="width:76px">PETROL:</label> <input id="petrol" name="petrol" size="50" type="text" class="medium" value="<?php echo $post->data['name3'] ?>" /></div>
		</div>
		<br />
        </form>
    </div> <!-- .x12 -->
</div>
<script>

<?php
require_once 'parts/footer.php';
?>