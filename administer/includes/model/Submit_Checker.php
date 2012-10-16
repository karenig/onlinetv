<?php

/*
 * class for working with submited form data - post
 */
class Submit_Checker{

    public function emptyExists($required){
        $empty = false;
        foreach($required as $r){
            if(!isset($_POST[$r])){
                $empty = true;
            }else{
                if(trim($_POST[$r])==''){
                    $empty = true;
                }
            }
        }
        return $empty;
    }
    
    public function getDataWithout($keys){
        $data = $_POST;
        foreach ($data as $k=>$v){
            if(in_array($k, $keys)){
                unset($data[$k]);
            }
        }
        return $data;
    }
    
}
?>
