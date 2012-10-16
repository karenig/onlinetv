<?php

class Poll{
    public $id;
    public $data;
    
    public function __construct() {
        ;
    }
    
    public function add(){
        $db = new Db();
        $db->insert('polls', $this->data);
        return $this->id;
    }
    
    public function load($id){
        $db = new Db();
        $this->data = $db->fetchOne("SELECT * FROM polls WHERE id='$id' LIMIT 0,1");
        
        $this->data['question'] = unserialize($this->data['question']);
        $this->data['answers'] = unserialize($this->data['answers']);
        
        $this->id = $id;
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
        $db->update('polls', $this->data, "id='$this->id'");
    }
	 
    public static function delete($id) {
        $db = new Db();
        $db->delete('polls', "id='$id'");
    }
    
    public static function approve($id) {
        $db = new Db();
        $db->update('polls', array('is_active'=>1), "id='$id'");
    }
    
    public static function unapprove($id) {
        $db = new Db();
        $db->update('polls', array('is_active'=>0), "id='$id'");
    }
	
    public static function getPolls() {
        $db = new Db();
        
        $polls = $db->fetchAll("SELECT * FROM polls WHERE 1=1 ORDER BY date DESC");
        return $polls;
    }  
        
}
?>
