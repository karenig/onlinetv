<?php

class Poll{
    public $id;
    public $data;
    public $details;
    public $savedata;
    
    public function __construct() {
        ;
    }
    
    public function save(){
        $db = new Db();
        
        foreach($this->savedata['answers'] as &$answer) {
            $answer['arm'] = htmlspecialchars($answer['arm'], ENT_QUOTES);
            $answer['rus'] = htmlspecialchars($answer['rus'], ENT_QUOTES);
            $answer['eng'] = htmlspecialchars($answer['eng'], ENT_QUOTES);
        }
        $this->savedata['answers'] = serialize($this->savedata['answers']);
        
        $db->update('polls', $this->savedata, "id='$this->id'");
    }
    
    public function saveDetails(){
        $db = new Db();
        
        $db->insert('polls_details', $this->details);
    }
    
    public function load($id){
        $db = new Db();
        $this->data = $db->fetchOne("SELECT * FROM polls WHERE id='$id' LIMIT 0,1");
        
        $this->data['question'] = unserialize($this->data['question']);
        $this->data['answers'] = unserialize($this->data['answers']);
        
        $this->id = $id;
    }
	
    public static function getPolls() {
        $db = new Db();
        
        $polls = $db->fetchAll("SELECT * FROM polls WHERE 1=1 ORDER BY date DESC");
        return $polls;
    }  
    
    public static function getLast() {
        $db = new Db();
        
        $poll = $db->fetchOne("SELECT * FROM polls WHERE 1=1 ORDER BY id DESC LIMIT 0,1");
        $poll['question'] = unserialize($poll['question']);
        $poll['answers'] = unserialize($poll['answers']);
        return $poll;
    }
    
    public static function checkIp($id) {
        $db = new Db();
        $ip = $_SERVER["REMOTE_ADDR"];
        
        $poll_detail = $db->fetchOne("SELECT COUNT(*) AS ct FROM polls_details WHERE ip='{$ip}' AND poll_id={$id} ORDER BY id DESC LIMIT 0,1");
        
        return $poll_detail['ct'];
    }
        
}
?>
