<?php

class Category{
    public static $all = array('21','8','11','26','23','14','5','17','38');
    public static $home = array('1' => 5,'2' => 4258,'3' => 21,'4' => 4261, '5' => 4262);
    public static $head_categories = array(
                        '15' => 'films',  '88' => 'xohanoc',  '47' => 'horoskop',
                        '48' => 'horoskop',
                        '51' => 'serials',
                        '52' => 'serials',
                        '53' => 'serials',
                        '54' => 'serials',
                        '55' => 'serials',
                        '56' => 'serials',
                        '57' => 'serials',
                        '58' => 'serials',
                        '59' => 'serials',
                        '60' => 'serials',
                        '61' => 'serials',
                        '62' => 'serials',
                        '63' => 'serials',
                        '64' => 'serials',
                        '65' => 'serials',
                        '66' => 'serials',
                        '67' => 'tv_programs'
                    );
    public static $lrahos = array('29','9','40','2','3','4','5','6','7','8','10','11','12','13','42','43');
    
    public function __construct() {
        
    }
    
    public static function getMap(){
        $db = new Db();
        $categories = $db->fetchAll("SELECT id,title FROM category");
        
        $map = array();
        foreach ($categories as $c){
            $map[$c['id']] = $c['title'];
        }
        return $map;
    }
    
    public static function getLink($id,$map){
        return ROOT_URL.'/category/id/'.$id.'/name/'.$map[$id]['name1'];
    }
    
}
?>
