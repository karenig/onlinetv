<?php

class Category{
    public static $all = array('21','8','11','26','23','14','5','17','38');
    public static $home = array('1' => 5,'2' => 4258,'3' => 21,'4' => 4261, '5' => 4262);
    
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
    
    public static function getLink($id,$map){
        return ROOT_URL.'/category/id/'.$id.'/name/'.$map[$id]['name1'];
    }
    
}
?>
