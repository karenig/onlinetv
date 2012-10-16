<?php

class Post{
    public $id;
    public $data;
    public $details;
    public $categories = array();
    public $date = '';
    public $options = '';
    
    /*settings*/
    private $num_words_in_short_desc = 20;
    private static $perpage = 20;


    public function __construct() {
        ;
    }
    
    public function add(){
        $db = new Db();
        date_default_timezone_set('Asia/Baku');
        $db->insert('post',array('id'=>'', 'date' => time()));
        $this->id = $db->lastInsertID();
        $db->insert('post_details',array('id'=>$this->id));
        return $this->id;
    }
    
    public function loadPost($id){
        $db = new Db();
        $this->data = $db->fetchOne("SELECT * FROM post WHERE id='$id' LIMIT 0,1");
        foreach ($this->data as $k=>$v){
            $this->data[$k] = trim($this->data[$k]);
        }
        for($i=1;$i<=3;$i++){
            if($this->data['cat'.$i]){
                $this->categories[] = $this->data['cat'.$i];
            }
            unset($this->data['cat'.$i]);
        }
        $this->id = $id;
        unset($this->data['id']);
        
        $this->details = $db->fetchOne("SELECT * FROM post_details WHERE id='$id' LIMIT 0,1");
        foreach ($this->details as $k=>$v){
            $this->details[$k] = trim($this->details[$k]);
        }
		$this->details['images'] = unserialize($this->details['images']);
		if(!is_array($this->details['images'])){
			$this->details['images'] = array();
		}
    }
	
    public function isFull(){
        $full = true;
        if($this->data['name1'] == ''){
            $full = false;
        }
        if($this->details['description1'] == ''){
            $full = false;
        }
        if(!count($this->categories)){
            $full = false;
        }
        return $full;
    }
    
    public function save(){
        $db = new Db();
        $this->createShortDescriptions();
        $db->update('post', $this->data, "id='$this->id'");
        $db->update('post_details', $this->details, "id='$this->id'");
    }
	 
    public function addImage($image,$url){
        $db = new Db();
        $db->update('post', array($image=>addslashes($url)), "id='$this->id'");
    }


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
    
    public static function delete($id) {
        $db = new Db();
        $db->delete('post', "id='$id'");
    }
    
    public static function approve($id) {
        $db = new Db();
        $db->update('post', array('is_approved'=>1), "id='$id'");
    }
    
    public static function unapprove($id) {
        $db = new Db();
        $db->update('post', array('is_approved'=>0), "id='$id'");
    }
	
	public static function get_data_from_date($date) {
		date_default_timezone_set('Asia/Baku');
        //$date = explode(" ", $date);
        //$hours = $date[1];
        //$hours = explode(":", $hours);
        $result["date"] = date("Y-m-d", $date);
        $result["hour"] = date("H", $date);
        $result["minute"] = date("i", $date);
        $result["second"] = date("s", $date);
        return $result;
    }
	
    public static function get_date_from_data($date, $hour, $minute, $second = "00") {
		date_default_timezone_set('Asia/Baku');
		return $date."\n".$hour.":".$minute.":".$second;
    }
	
	public static function date($date, $short = false){
	date_default_timezone_set('Asia/Baku');
		if($short) {
			$date = date("H:i:s", $date);
		} else {
			$date = date("Y-m-d H:i:s", $date);
		}
        echo $date;
    } 
    
    public static function getPosts($page=1, $search='', $cat_id='', $type = 'full') {
        $db = new Db();
        $start = ($page-1)*(self::$perpage);
        $perpage = self::$perpage;
        $posts_count = self::getPostsCount($search, $cat_id, $type);
		$pagination_url = ADMIN_URL.'?part=posts';
		
		$where = array('1=1');
		
        if($search != '') {
            $where[] = '(name1 LIKE "%'.$search.'%" OR short1 LIKE "%'.$search.'%")';
			$pagination_url .= "&search=".$search;
        } 
        if($cat_id != '') {
            $where[] = "(cat1='$cat_id' OR cat2='$cat_id' OR cat3='$cat_id')";
			$pagination_url .= "&category=".$cat_id;
        } 
        if($type == 'draft') {
            $where[] = "is_draft=1";
			$pagination_url .= "&type=".$type;
        } else {
            $where[] = "is_draft=0";
        }  
		
		$pagination = new Pagination($page, $perpage, $posts_count, $pagination_url);
        $pager = $pagination->getPagesLinksString();
        $where = implode(' AND ',$where );
        $posts = $db->fetchAll("SELECT * FROM post WHERE $where ORDER BY date DESC LIMIT $start,$perpage");
        $posts['pager'] = $pager;
        return $posts;
    }  
    
    public static function getPostsCount($search = '', $cat_id = '', $type = 'full') {
        $db = new Db();
        $where = array('1=1');
		
        if($search != '') {
            $where[] = '(name1 LIKE "%'.$search.'%" OR short1 LIKE "%'.$search.'%")';
        } 
        if($cat_id != '') {
            $where[] = "(cat1='$cat_id' OR cat2='$cat_id' OR cat3='$cat_id')";
        }
        if($type == 'draft') {
            $where[] = "is_draft=1";
        } else {
            $where[] = "is_draft=0";
        } 
	$where = implode(' AND ',$where );
        $posts_count = $db->fetchOne("SELECT COUNT(*) as ct FROM post WHERE $where");
        return $posts_count['ct'];
    }
	
	public static function getPostsByCategories($cat_ids,$count,$page = 1){
        $db = new Db();
        $categories = $cat_ids;
        $categories = implode(',', $categories);
		$start = ($page-1)*($count);
		
		$posts = $db->fetchAll("SELECT * FROM post WHERE (cat1 IN($categories) OR cat2 IN($categories) OR cat3 IN($categories)) AND is_approved!=0 ORDER BY date DESC LIMIT $start,$count");
     
		return $posts;
    }
    
}
?>
