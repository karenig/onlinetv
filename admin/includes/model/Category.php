<?php

class Category{
	public $data;
    
    public function __construct() {
        
    }
	
	public function __get($key){
		return (isset($this->data[$key]))? $this->data[$key]:array();
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
	
	public function getCategoryTree(){
		$db = new Db();
		$AllCategories = array();
		$ParentCategories = array();
		$SubCategories = array();
		$query = "SELECT c.id AS cid, c.title AS ctitle, csub.id AS csubid, csub.title AS csubtitle FROM category as c 
					LEFT JOIN category AS csub ON c.id=csub.parent_id  WHERE c.parent_id=0";
        $categories = $db->fetchAll($query);

        foreach ($categories as $c){
			if(!key_exists($c['cid'], $AllCategories)) {
				$AllCategories[$c['cid']] = $c['ctitle'];
				$ParentCategories[$c['cid']] = $c['ctitle'];
			}
			
			if(isset($c['csubid'])) {
				$SubCategories['sub_'.$c['cid']][$c['csubid']] = $c['csubtitle'];
				$AllCategories[$c['csubid']] = $c['csubtitle'];
			}
			
			$this->data['AllCategories'] = $AllCategories;
			$this->data['ParentCategories'] = $ParentCategories;
			$this->data['SubCategories'] = $SubCategories;
        }
	}
    
}
?>
