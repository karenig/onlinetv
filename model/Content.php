<?php

class Content{
    public $id;
    public $data;
    public $details;
    public $categories = array();
	public $options;
    
    /*settings*/
    private $num_words_in_short_desc = 20;
    private static $perpage = 10;
    
    private function createShortDescriptions(){
        for($i=1;$i<=3;$i++){
            $description_stipped = strip_tags($this->details['description'.$i]);
            if($description_stipped != ''){
                $words = explode(' ', $description_stipped);
                $short = '';
                if(count($words > $this->num_words_in_short_desc)){
                    for($j=0;$j<=$this->num_words_in_short_desc;$j++){
                        $short .= $words[$j].' ';
                    }
                    $this->data['short'.$i] = $short;
                }else{
                    $this->data['short'.$i] = $description_stipped;
                }
            }else{
                $this->data['short'.$i] = '';
            }
        }
    }
    
    public static function getContents($page=1){
        $start = ($page-1)*(self::$perpage);
        $perpage = self::$perpage;
        $categories_in = implode("','", Category::$lrahos);
        $db = new Db();
        $posts = $db->fetchAll("SELECT * FROM nodes WHERE type IN('" . $categories_in . "') ORDER BY timestamp DESC LIMIT $start,$perpage");
        return $posts;
    }
    
    public function loadContent($title){
        $db = new Db();
        $this->data = $db->fetchOne("SELECT * FROM nodes WHERE urls='".addslashes($title)."' LIMIT 0,1");
        foreach ($this->data as $k=>$v){
            $this->data[$k] = trim($this->data[$k]);
        }
        
        $this->id = $this->data['nid'];
        unset($this->data['nid']);
        
        $this->details = $db->fetchOne("SELECT * FROM node_details WHERE nid='".$this->id."' LIMIT 0,1");
        foreach ($this->details as $k=>$v){
            $this->details[$k] = trim($this->details[$k]);
        }

    }
	
	public static function loadOptions($id){
        $db = new Db();
        $this->options = $db->fetchOne("SELECT * FROM options");
    }
    
    public static function getPostsByCategory($cat_id,$count,$page=1){
        $db = new Db();
        date_default_timezone_set('Asia/Baku');
        $start = ($page-1)*($count);
        $time = time();
        $posts = $db->fetchAll("SELECT * FROM post WHERE (cat1='$cat_id' OR cat2='$cat_id' OR cat3='$cat_id') AND is_approved!=0 AND date<$time ORDER BY date DESC LIMIT $start,$count");
		
        
        return $posts;
    }
	
    public static function getContentsByCategory($cat_id, $count, $page=1){
        $db = new Db();
        $start = ($page-1)*($count);
        date_default_timezone_set('Asia/Baku');
        $time = time();
        $posts = $db->fetchAll("SELECT * FROM post AS p LEFT JOIN post_details AS pd ON p.id=pd.id  WHERE (cat1='$cat_id' OR cat2='$cat_id' OR cat3='$cat_id') AND is_approved!=0 AND date<$time ORDER BY date DESC LIMIT $start,$count");

        return $posts;
    }
    
    public static function getPostsByCategories($cat_ids,$count,$page = 1){
        $db = new Db();
        $categories = $cat_ids;
        $categories = implode(',', $categories);
        $start = ($page-1)*($count);
        date_default_timezone_set('Asia/Baku');
        $time = time();
        $posts = $db->fetchAll("SELECT * FROM post WHERE (cat1 IN($categories) OR cat2 IN($categories) OR cat3 IN($categories)) AND is_approved!=0 AND date<$time ORDER BY date DESC LIMIT $start,$count");
        
	return $posts;
    }
    
    public static function getPostsByIds($ids,$count){
        $db = new Db();
        $post_ids = $ids;

		$posts = $db->fetchAll("SELECT * FROM post WHERE id IN(".$ids.") AND is_approved!=0 ORDER BY date DESC LIMIT 0,$count");

		return $posts;
    }
    
    public static function getMostViewed($count = 5){
        $db = new Db();
        
		$posts = $db->fetchAll("SELECT * FROM post WHERE is_approved!=0 ORDER BY view DESC LIMIT 0,$count");

		return $posts;
    }
    
    public static function getLink($name){
        $name = str_replace(" ", "-", $name);
        echo ROOT_URL.'/content/'.$name.'/';
    }
    
    public static function isBlue(&$name){
		$pos = strpos($name, "(show blue)");
		if ($pos !== false) {
			$name = str_replace("(show blue)", "", $name);
			return true;
		}else{
			return false;
		}               
    }
	
    public static function getPostName($name, $count = 0) {
            if($count) {
                    $name = substr($name, 0, $count);
                    $name = substr($name, 0, strrpos($name, " "));
                    return $name;
            } else {
                    return $name;
            }
    }
    
    public static function get_one_sentence($content){
        $content = substr($content, 0, strpos($content, ":"));
        return $content;
    }
    
    public static function date($date, $short = false){
	date_default_timezone_set('Asia/Baku');
		if($short) {
			$date = date("H:i", $date);
		} else {
			$date = date("Y-m-d H:i", $date);
		}
        return $date;
    } 
	
	public static function date_header(){
		date_default_timezone_set('Asia/Baku');
		$week_name = array('Mon'=>'Monday','Tue'=>'Tuesday','Wed'=>'Wednesday','Thu'=>'Thursday','Fri'=>'Friday','Sat'=>'Saturday','Sun'=>'Sunday');
		$date = time();
		$day = date('d', $date);
		$month = date('m', $date);
		$year = date('Y', $date) ;
		$first_day = mktime(0,0,0,$month, 1, $year) ;
		$month_title = date('F', $date) ;
		$day_of_week = date('D', $date);
		return tr($month_title,"ի")."\t".(int)$day.",\t".tr($week_name[$day_of_week]);
    } 
    
    public static function imageSrc($image,$width,$height,$is_next = false){
            $suff = '';
            $suffix = array("_1","_2");
            $parts = explode('.',$image);
            $ext = array_pop($parts);
            $parts = implode('.', $parts);
            if($is_next) {
                    foreach($suffix as $value) {
                            if(substr($parts, -2) == $value) {
                                    $suff = $value;
                                    $parts = substr($parts, 0, -2);
                            }
                    }
            }	
            $image = $parts."-".$width."x".$height.$suff.".".$ext;
            return $image;
    }
	
	
    
}
?>
