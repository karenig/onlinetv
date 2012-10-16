<?php 
if(isset($_POST['Save'])){
  
    /*main data*/
	$options_data['usd'] = $_POST['usd'];
    $options_data['euro'] = $_POST['euro'];
    $options_data['rub'] = $_POST['rub'];
    $options_data['gold'] = $_POST['gold'];
    $options_data['petrol'] = $_POST['petrol'];
	
	$contents = '<?php
			$options_data = "' . addslashes(serialize($options_data)) . '";
		?>';
	$fp = @fopen(ROOT_DIR . '/cache/options/options.php', "w+");
	@fwrite($fp, $contents);
	   
}else{
    require_once ROOT_DIR . '/cache/options/options.php';
	$options_data = unserialize($options_data);
}

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
		<form action="<?php echo ADMIN_URL ?>/?part=options" method="post" enctype="multipart/form-data" class="form label-inline uniform">
		<div id="tabs-1">
			<div class="field"><label for="usd" style="width:76px">USD:</label> <input id="usd" name="usd" size="50" type="text" class="medium" value="<?php echo $options_data['usd']; ?>" /></div>
			<div class="field"><label for="euro" style="width:76px">EURO:</label> <input id="euro" name="euro" size="50" type="text" class="medium" value="<?php echo $options_data['euro']; ?>" /></div>
			<div class="field"><label for="rub" style="width:76px">RUB:</label> <input id="rub" name="rub" size="50" type="text" class="medium" value="<?php echo $options_data['rub']; ?>" /></div>
			<div class="field"><label for="gold" style="width:76px">GOLD:</label> <input id="gold" name="gold" size="50" type="text" class="medium" value="<?php echo $options_data['gold']; ?>" /></div>
			<div class="field"><label for="petrol" style="width:76px">PETROL:</label> <input id="petrol" name="petrol" size="50" type="text" class="medium" value="<?php echo $options_data['petrol']; ?>" /></div>
		</div>
		<br />
		<div class="buttonrow">
			<input type="submit" name="Save" value="Save" class="btn btn-orange" />
		</div>
        </form>
    </div> <!-- .x12 -->
</div>
<script>

<?php
require_once 'parts/footer.php';
?>