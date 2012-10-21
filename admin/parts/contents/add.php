<?php 
require_once 'includes/class.upload.php';

$content = new content();
$category_map = Category::getMap();

if(isset($_content['Save'])){
    
    $content->id = $_GET['id'];
    /*main data*/
    $content->data['title'] = $_content['title'];
    $content->data['krchat'] = $_content['short'];
	$content->data['date'] = time();
    
    /*images*/
    $sizes = array(
        array(130,80),
        array(300,200),
        array(125, 95),
        array(180, 130),
        array(85, 50),
        array(300, 240),
        array(212, 110),
    );
    require_once 'parts/contents/image_upload_helper.php';
    
    /*categories*/
    $category = $_content['category'];
    for($i=1;$i<=3;$i++){
        if(isset($category[$i-1])){
            $content->data['cat'.$i] = $category[$i-1];
            $content->categories[] = $category[$i-1];
        }else{
            $content->data['cat'.$i] = 0;
        }
    }
    
    /*content_details*/
    $content->details['body'] = $_content['description'];
	$content->details['krchat'] = $_content['short'];
	$content->details['video'] = $_content['video'];
    
    if(!$content->isFull()){
        $content->data['is_approved'] = 0;
        $error = true;
    }
	
    $content->save();
	$content->loadContent($_GET['id']);
	
	/*cache*/
	$cache_api = new Iguan_Cache();
	
	$cache_api->data = $content->data;
	$cache_api->details = $content->details;
	
	$cache_api->categories = $content->categories;
	$cache_api->related = content::getcontentsByCategories($content->categories,5);
	
	$cache_api->saveData($content->id);
	
}else{
    /*$content->loadcontent($_GET['id']);
    if(!$content->isFull()){
        $content->data['is_draft'] = 1;
        $error = true;
    }*/
}
if($_GET['fromadd'] == 1){
    $error = false;
}

//$date = content::get_data_from_date($content->data['date']);

require_once 'parts/header.php';
?>
<div id="masthead">
	<link href="<?php echo ADMIN_URL; ?>/js/multi_uploader/fileuploader.css" rel="stylesheet" type="text/css">
    

        <h1 class="no_breadcrumbs">Edit content</h1>

        <div id="search">
            
        </div> <!-- #search -->

   
    <script type="text/javascript">
    function deleteImage(image){
        url = '<?php echo ADMIN_URL.'/ajax.php?part=ajax&action=delete_image&image='; ?>'+image+'<?php echo '&id='.$content->id; ?>';
        $.ajax({
          url: url,
          success: function(result){
              $('#i_'+image).css('display','none');
              $('#h_'+image).html('');
              $('#u_'+image).css('display','block');
          }
        });
    }
	function deleteMultiImage(image,id){
        url = '<?php echo ADMIN_URL.'/ajax.php?part=ajax&action=delete_multi_image&id='.$content->id; ?>';
		$.ajax({
          url: url,
		  type: 'content',
		  data: { image: image },
          success: function(result){
              $('#'+id).css('display','none');
          }
        });
    }
    </script>
</div> <!-- #masthead -->
<div id="content" class="xgrid">

    <div class="x12">

        <?php if($error){ ?>
            <h2 style="color: red">Please fill the data carefully!!!</h2>
        <?php } ?>

            <form action="<?php echo ADMIN_URL ?>/?part=contents&view=edit&id=<?php echo $content->id ?>" method="content" enctype="multipart/form-data" class="form label-inline uniform">
                <div>
                    <div class="field"><label for="name1" style="color: #333333;">Title:</label> <input id="name1" name="name1" size="50" type="text" class="medium" value="<?php echo $content->data['name1'] ?>"/></div>
                    <div class="field">
                        <label for="myArea1" style="color: #333333;">Description</label> <br clear="all" /><br clear="all" />
                        <textarea rows="7" cols="90" style="width: 800px; height: 250px;" id="myArea1" name="description1"><?php echo $content->details['description1'] ?></textarea>
                    </div>
                    <br clear="all" />
                    <div class="field">
                        <label for="krchat" style="color: #333333;">Teaser</label> <br clear="all" /> <br clear="all" /> <br clear="all" />
                        <textarea rows="4" cols="90" style="width: 800px; height: 250px;" id="myArea3" name="krchat"><?php echo $content->details['description1'] ?></textarea>
                    </div>
                    <br clear="all" />
                    
                </div>
            
			<br />
			
			<div class="field">
				<label for="videos">Videos</label><br clear="all" />
				<textarea rows="7" cols="90" style="width: 745px; height: 70px;" id="videos" name="videos"><?php echo $content->details['videos'] ?></textarea>
			</div>
			
			
            <div class="field clearfix">
                <?php if($content->data['image1'] != ''){ 
                    $display_image = "style='display:block'";
                    $display_upload = "style='display:none'";
                    ?><div id="h_image1"><input type="hidden" name="himage1" value="<?php echo $content->data['image1'] ?>" /></div><?php
                }else{ 
                    $display_image = "style='display:none'";
                    $display_upload = "style='display:block'";
                } ?>
                <div id="i_image1" <?php echo $display_image ?>>
                    <img src="<?php echo $content->data['image1'] ?>" /><b onclick="deleteImage('image1')" style="color: #900; cursor: pointer">Delete</b>
                    <br clear="all" />
                </div>
                <div id="u_image1" <?php echo $display_upload ?>>
                    <label for="image1">Image1</label><input style="opacity: 0;" name="image1" type="file" /><br clear="all" />		
                </div>
            </div>

            <div class="controlset field">
                <span class="label">Category</span>
                <div class="controlset-pad">
                    <?php /*foreach($category_map as $id=>$c){ ?>
                        <input name="category[]" id="check<?php echo $id ?>" value="<?php echo $id ?>" type="checkbox" <?php if(in_array($id, $content->categories)){ ?>checked="checked"<?php } ?> />  
                        <label for="check1"><?php echo $c['name1'] ?></label><br />
                    <?php }*/ ?>
                </div>
            </div>
            <br />
            <div class="buttonrow">
                <input type="submit" name="Save" value="Save" class="btn btn-orange" />
            </div>

        </form>

    </div> <!-- .x12 -->

</div>
<script>
var area1;
area1 = new nicEditor({fullPanel : true}).panelInstance('myArea1');

var area2;
area2 = new nicEditor({fullPanel : true}).panelInstance('myArea2');

var area3;
area3 = new nicEditor({fullPanel : true}).panelInstance('myArea3');
</script>
<?php
require_once 'parts/footer.php';
?>
<script src="<?php echo ADMIN_URL; ?>/js/multi_uploader/fileuploader.js" type="text/javascript"></script>
<script>        
    function createUploader(){            
        var uploader = new qq.FileUploader({
            element: document.getElementById('file-uploader-demo1'),
			onComplete: function(id, fileName, responseJSON){
				$.ajax({
					url: '<?php echo ADMIN_URL; ?>/ajax.php?action=refresh_multi&id=<?php echo $content->id ?>',
					success: function(result){
						$('#multi_images').html(result);
					}
				});
			},
            action: '<?php echo ADMIN_URL; ?>/ajax.php?action=multiupload&id=<?php echo $content->id ?>',
            debug: true
        });
		
    }

    // in your app create uploader as soon as the DOM is ready
    // don't wait for the window to load  
    window.onload = createUploader;     
</script> 
<script type="text/javascript" src="<?php echo ADMIN_URL; ?>/js/jquery/jquery-ui-1.8.12.custom.min.js"></script>
<script type="text/javascript">
        $(function(){

                // Tabs
                //$('#tabs').tabs();

                //hover states on the static widgets
                $('#dialog_link, ul#icons li').hover(
                        function() { $(this).addClass('ui-state-hover'); }, 
                        function() { $(this).removeClass('ui-state-hover'); }
                );

        });
</script>