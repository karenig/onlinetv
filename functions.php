<?php
function parseRSS($xml) {

    $image = '';

    $result = '';

    $cnt = count($xml->channel->item);

    for($i=0; $i<$cnt; $i++) {

        if(preg_match("/yerevan/i", $xml->channel->item[$i]->title)) {

            preg_match("#big/+([a-zA-Z _&;]+).png#s", $xml->channel->item[$i]->description, $matches);

            if($matches[0] != '') {

                $image = "<img src='".THEME_URL."images/weather/".$matches[0]."'>";

            }

            $desc = $xml->channel->item[$i]->description;

            $desc = strip_tags($desc);

            $desc = preg_replace("([a-zA-Z _&;]+)", "", $desc);

        }

    }

    $desc = explode("+",$desc);

    $result = $image."<br />".end($desc)."В°C";

    return $result;

}

?>
