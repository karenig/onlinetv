<?php
$image = new Upload($_FILES['nicImage']);

$uploaded = $image->uploaded;

if($uploaded) {
    $time = time();
    $image->file_new_name_body = sanitize($image->file_src_name_body.'600'.$time);
    $name = sanitize($image->file_src_name_body.'600'.$time).'.'.$image->file_src_name_ext;
    $_SESSION['id'.$_GET['id']] = $name;
    //var_dump($name);exit;
    $image->image_resize = true;
    $image->image_x = 600;
    $image->image_ratio_y = true;
    $image->Process($root_dir);
    echo $root_dir;exit;
    if ($image->processed) {
    ?>nicUploadButton.statusCb({
        "total":879721,
        "current":879721,
        "filename":"<?php echo $name; ?>",
        "name":"nicImage",
        "temp_filename":"\/tmp\/php251ky6",
        "cancel_upload":0,
        "done":0,
        "start_time":1320956176.6,
        "url":"<?php echo addcslashes($root_href.'/',"\\\'\"&\n\r\/\-\ <>").$name; ?>",
        "thumb":"<?php echo addcslashes($root_href.'/',"\\\'\"&\n\r\/\-\ <>").$name; ?>",
        "width":"600",
        "interval":1000,
        "count":4
        });<?php
        $image->Clean();
    } else {
        echo 'error : ' . $image->error;
    }
    exit;
}elseif($_SESSION['id'.$_GET['check']] != ''){
    $name = $_SESSION['id'.$_GET['check']];
    ?>nicUploadButton.statusCb({
    "total":879721,
    "current":879721,
    "filename":"<?php echo $name; ?>",
    "name":"nicImage",
    "temp_filename":"\/tmp\/php251ky6",
    "cancel_upload":0,
    "done":0,
    "start_time":1320956176.6,
    "url":"<?php echo addcslashes($root_href.'/',"\\\'\"&\n\r\/\-\ <>").$name; ?>",
    "thumb":"<?php echo addcslashes($root_href.'/',"\\\'\"&\n\r\/\-\ <>").$name; ?>",
    "width":"600",
    "interval":1000,
    "count":4
    });<?php
}

function sanitize($string, $force_lowercase = true, $anal = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                   "—", "–", ",", "<", ".", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
}

?>