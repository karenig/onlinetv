<?php
class Xml_Api{
    private $xmlDoc;
    private $rates = array("usd" => 0, "euro" => 9, "ruble" => 49);
    
    public function __construct() {
        $this->xmlDoc = new DOMDocument();
    }
    
    public function get_rates($feed_url) {
        $this->xmlDoc->load($feed_url);
        $item=$this->xmlDoc->getElementsByTagName('item');
        $results = array();
        foreach($this->rates as $key=>$value) {
            $item_title = $item->item($value)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
            $results[$key] = str_replace("- 1 -", " - ", $item_title);
        }
        
        return $results;
    }
    
    public function get_weather($feed_url) {
        $this->xmlDoc->load($feed_url);
        $item=$this->xmlDoc->getElementsByTagName('item');
          $item_title = $item->item(1)->getElementsByTagName('description')
          ->item(0)->childNodes->item(0)->nodeValue;
        
          echo strip_tags($item_title);
    }
}
?>
