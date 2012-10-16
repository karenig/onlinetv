<?php
class MySQL{
    protected $link;
    protected static $_instance;
    public $errors;

    final private function  __construct() {
        $params = $this->translateConfigurationString(DB_PARAMS);
        $this->link = mysql_connect($params['host'], $params['user'], $params['pass']);
        mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $this->link);
        if (!$this->link) {
            die('Could not connect: ' . mysql_error());
        }else{
            mysql_select_db($params['dbname'],$this->link);
        }
    }

    public static function getInstance(){
        if(isset(self::$_instance)){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }

    public function execute($query){
        $result = mysql_query($query);

        if (!$result) {
            //$this->errors[]  = 'Invalid query: ' . mysql_error() . "\n Whole query: ' . $query";
            echo 'Invalid query: ' . mysql_error() . "\n Whole query: ' . $query";
        }
        return $result;
    }

    /**
     *
     * @todo list and row objects
     */
    public function query($query){
        $result = mysql_query($query); //echo $query;
		
		if(LOG_QUERIES){
			date_default_timezone_set('Asia/Baku');
			$date =date('Y-m-d H:i:s');
			$contents = $date . ' - ' . $_SERVER['REMOTE_ADDR'] . ' - ' . $_SERVER['REQUEST_URI'] . ' 
';
			$fp = @fopen(ROOT_DIRECTORY . '/log/mysql.txt', "a+");
			@fwrite($fp, $contents);
		}
       
        if (!$result) {
            //$this->errors[]  = 'Invalid query: ' . mysql_error() . "\n Whole query: ' . $query";
            echo  'Invalid query: ' . mysql_error() . "\n Whole query: ' . $query";
        }
        $return = array();
        while ($row = @mysql_fetch_assoc($result)) {
            foreach ($row as $k=>$v){
                //$row[$k] = stripslashes($v);
                $row[$k] = $v;
            }
            $return[] = $row;
        }
        
        return $return;
    }

    private function translateConfigurationString($config){
        $array = explode(';;', $config);
        $result = array();
        foreach ($array as $config_element){
            $tmp = explode('=>', $config_element);
            $result[$tmp[0]] = $tmp[1];
        }
        return $result;
    }

    public function  __destruct() {
        mysql_close($this->link);
    }

}
?>