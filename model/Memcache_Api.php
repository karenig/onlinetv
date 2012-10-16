<?php
class Memcache_Api{
	private static $_instance;
	private $memcache;
	private $default_time = 300;
    
    private final function __construct() {
		$this->memcache = new Memcache;
		$this->memcache->connect('localhost', 11211) or die ("Could not connect");
		$this->default_time = 300;
    }
	
	public static function getInstance(){
		if(isset(self::$_instance)){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
	}
	
	public function setTime($time){
		$this->default_time = $time;
	}

    public function __set($name,$value){
		$this->memcache->set($name, $value, false, $this->default_time) or die ("Failed to save data at the memcache");
	}
	
	public function __get($name){
		$result = $this->memcache->get($name);
		return $result;
	}
	
	public function flush(){
		$this->memcache->flush();
	}

}

?>