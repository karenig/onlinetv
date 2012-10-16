<?php date_default_timezone_set('Asia/Baku'); ?> 
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"> 

    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>Iguan CMS Admin Panel</title> 

    </head> 

    <body> 
<?php
$db = new Db();
$posts = $db->fetchAll("SELECT * FROM post ORDER BY date DESC");

foreach ($posts as $p){
    //$date = $p['date'];
    //echo $date."<br />";
    $date = strtotime($p['date']);
    
    //echo date("Y-m-d H:i:s", $date)."<br />";
    
//    var_dump($date."<br />");
//    $data = array(
//        $key=>$meta_value,
//    );
    
	$data = array(
        'test_date'=>$date,
    );
	$id = $p['id'];
    $db->update('post', $data, "id='$id'");
 
}
    
?>
    </body>
</html>