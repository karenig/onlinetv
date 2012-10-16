<?php
$root_dir = ROOT_DIR.'/uploads/post_main_images';
$root_href = ROOT_URL.'/uploads/post_main_images';

for($i=1;$i<=3;$i++){
    if($_FILES['image'.$i]['name'] != ''){
        uploadImage('image'.$i);
    }elseif($_POST['himage'.$i] != ''){
        $post->data['image'.$i] = $_POST['himage'.$i];
    }
}

function uploadImage($image_input){
    global $root_dir;
    global $root_href;
    global $post;
    global $sizes;
    $image = new Upload($_FILES[$image_input]);
    if ($image->uploaded) {
        $dir = $root_dir.'/'.$post->id;
        if(!file_exists($dir)){
            mkdir($dir,0777);
        }
        
        $image->file_new_name_body = $image->file_src_name_body;
        $image->image_resize = true;
        //$image->image_x = 600;
        $image->image_ratio_y = true;
        $image->Process($dir);
        if ($image->processed) {
            $url = $root_href.'/'.$post->id.'/'.$image->file_dst_name;
            $post->addImage($image_input,$url);
            $post->data[$image_input] = $url;
        } else {
            echo 'error : ' . $image->error;
        }
        foreach($sizes as $size){
            $image->file_new_name_body = $image->file_src_name_body.'-'.$size[0].'x'.$size[1];
            $image->image_resize = true;
            $image->image_x = $size[0];
            $image->image_y = $size[1];
            $image->image_ratio_crop = true;
            $image->Process($dir);
            if ($image->processed) {
            } else {
                echo 'error : ' . $image->error;
            }
        }
        $image->Clean();
    }
}
?>
