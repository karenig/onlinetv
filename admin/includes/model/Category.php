<?php

class Category{
    
    public function __construct() {
        
    }
    
    public static function getMap(){
        $db = new Db();
        $categories = $db->fetchAll("SELECT * FROM category");
        $map = array();
        foreach ($categories as $c){
            $map[$c['id']] = $c;
        }
        return $map;
    }
    
}
?>
