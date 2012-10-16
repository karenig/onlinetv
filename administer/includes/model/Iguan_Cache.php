<?php
class Iguan_Cache{
    private $data;

    public function __construct(){

    }
    
    public function __get($name) {
        if(isset($this->data[$name])){
            return $this->data[$name];
        }else{
            return '';
        }
    }
	
	public function __set($name,$value) {
        return $this->data[$name] = $value;
    }
	
	public function saveData($id){
		$data = $this->getDataSerialized();
		$contents = '<?php
			$cache_data = "' . $data . '";
		?>';
		$fp = @fopen(ROOT_DIR . '/cache/'. $id . '.php', "w+");
		@fwrite($fp, $contents);
	}
	
	public function getDataSerialized(){
		$this->cleanData($this->data);
		$serialized = serialize($this->data);
		$serialized = addslashes($serialized);
		return $serialized;
	}

	private function cleanData($data){
		foreach($data as &$v){
			if(is_string($v)){
				$v = stripslashes($v);
			}
			if(is_array($v)){
				$this->cleanData($v);
			}
		}
	}
	
	public function loadData($data_s){
		$data_s = stripslashes($data_s);
		$data = unserialize($data_s);
		$this->data = $data;
	}

}

?>
