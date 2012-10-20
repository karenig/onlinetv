<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();
$nodes = $db->fetchAll("SELECT nid,title FROM nodes");

foreach ($nodes as $node){
    $punctuations = punctuation_chars();
    $url = $node['title'];
    foreach($punctuations as $name=>$details){
        $url = str_replace($details['value'], '-', $url);
    }
    $url = preg_replace('/\s+/', '-', $url);
    $url = mb_strtolower($url, 'UTF-8');
    $nid = $node['nid'];
    $db->update('nodes', array('urls' => $url), "nid=$nid");
}


function punctuation_chars() {
    $punctuation = array();
    $punctuation['double_quotes']      = array('value' => '"');
    $punctuation['quotes']             = array('value' => "'");
    $punctuation['backtick']           = array('value' => '`');
    $punctuation['comma']              = array('value' => ',');
    $punctuation['period']             = array('value' => '.');
    $punctuation['hyphen']             = array('value' => '-');
    $punctuation['underscore']         = array('value' => '_');
    $punctuation['colon']              = array('value' => ':');
    $punctuation['semicolon']          = array('value' => ';');
    $punctuation['pipe']               = array('value' => '|');
    $punctuation['left_curly']         = array('value' => '{');
    $punctuation['left_square']        = array('value' => '[');
    $punctuation['right_curly']        = array('value' => '}');
    $punctuation['right_square']       = array('value' => ']');
    $punctuation['plus']               = array('value' => '+');
    $punctuation['equal']              = array('value' => '=');
    $punctuation['asterisk']           = array('value' => '*');
    $punctuation['ampersand']          = array('value' => '&');
    $punctuation['percent']            = array('value' => '%');
    $punctuation['caret']              = array('value' => '^');
    $punctuation['dollar']             = array('value' => '$');
    $punctuation['hash']               = array('value' => '#');
    $punctuation['at']                 = array('value' => '@');
    $punctuation['exclamation']        = array('value' => '!');
    $punctuation['tilde']              = array('value' => '~');
    $punctuation['left_parenthesis']   = array('value' => '(');
    $punctuation['right_parenthesis']  = array('value' => ')');
    $punctuation['question_mark']      = array('value' => '?');
    $punctuation['less_than']          = array('value' => '<');
    $punctuation['greater_than']       = array('value' => '>');
    $punctuation['slash']              = array('value' => '/');
    $punctuation['back_slash']         = array('value' => '\\');
    
  return $punctuation;
}
    
?>
    </body>
</html>
