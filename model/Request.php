<?php
class Request{
    private $request;
    private $page;
    private $data = array();
    
    private $folder_deepth = 1;


    public function __construct(){
        $this->loadRequestString();
        $this->loadData();
    }
    
    public function __get($name) {
        if(isset($this->data[$name])){
            return $this->data[$name];
        }else{
            return '';
        }
    }
    
    public function getPage(){
        return $this->page;
    }
    
    public function isHome(){
        if($this->page == 'index'){
            return true;
        }
        return false;
    }


    private function loadData(){
        $request = $this->request;
        
        if(isset($request[1])){
            switch($request[1]){
                case "category":
                    // Check if head category.
                    if(key_exists($request[2], Category::$head_categories)) {
                        $this->page = $request[1] . '/' . Category::$head_categories[$request[2]];
                    } else {
                        $this->page = $request[1] . '/inner';
                    }
                    break;
                case "content":
                    $this->data['title'] = $request[2];
                    $this->page = $request[1] . '/inner';
                    break;
            }
            
        }else{
            $this->page = 'index';
        }
        
        for($i=0;$i<=$this->folder_deepth;$i++){
            unset($request[$i]);
        }
        $request = array_values($request);
        $data = array();
        for($i=0;$i<count($request);$i+=2){
            $data[$request[$i]] = $request[$i+1];
        }
        $this->data = array_merge($this->data, $data);
    }
    
    private function loadRequestString(){
        $request = '';
        if(is_array($_GET)){
            foreach ($_GET as $k=>$v){
                $request = $k;
            }
        }
        
        $this->request = explode('/', $request);
    }
}

?>
