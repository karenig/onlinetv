<?php

class Category{
    public static $all = array('21','8','11','26','23','14','5','17','38');
    public static $home = array('1' => 5,'2' => 4258,'3' => 21,'4' => 4261, '5' => 4262);
    public static $head_categories = array(
                        '1' => 'news', 
                        '15' => 'films', 
                        '29' => 'eighteen', 
                        '88' => 'xohanoc', 
                        '40' => 'blog',
                        '41' => 'important_news',
                        '44' => 'horoskop',
                        '51' => 'serials',
                        '67' => 'tv_programs'
                    );
    
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
