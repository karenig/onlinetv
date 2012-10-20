<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
        <title>OnlineTV Admin Panel</title> 
    </head> 
    <body> 
<?php
$db = new Db();

/*$db->update('node', array('type' => 40), "type='blog'");
$db->update('node', array('type' => 9), "type='business'");
$db->update('node', array('type' => 29), "type='eighteen'");
$db->update('node', array('type' => 41), "type='important_news'");
$db->update('node', array('type' => 12), "type='interetsing'");*/

////////////////////////////////////////////////////// NEWS PART ////////////////////////////////////////////////////
/*$newsArray = array(
    '2' => 'Հասարակություն', 
    '3' => 'Քաղաքականություն', 
    '5' => 'Միջազգային', 
    '4' => 'Տնտեսություն', 
    '11' => 'LifeNews',
    '6' => 'Պատահարներ',
    '42' => 'Առողջապահություն',
    '10' => 'Սպորտ',
    '13' => 'Մամուլի տեսություն',
    '8' => 'Գիտություն',
    '7' => 'Կրթություն',
    '43' => 'Մշակույթ'
);

foreach($newsArray as $key=>$value) {
    $posts = $db->fetchAll("SELECT nid FROM news WHERE name='".$value."'");
    foreach($posts as $post) {
        $id = (int)$post['nid'];
        $db->update('node', array('type' => $key), "nid=$id");
    }
}*/

////////////////////////////////////////////////////// HOROSKOP PART ////////////////////////////////////////////////////
/*$horoskopArray = array(
    '46' => 'Ընդհանուր', 
    '47' => 'Ըստ տարերքների', 
    '48' => 'Էրոտիկ'
);

foreach($horoskopArray as $key=>$value) {
    $posts = $db->fetchAll("SELECT nid FROM horoskop WHERE name='".$value."'");
    foreach($posts as $post) {
        $id = (int)$post['nid'];
        $db->update('node', array('type' => $key), "nid=$id");
    }
}*/

////////////////////////////////////////////////////// SERIAL PART ////////////////////////////////////////////////////
/*$serialArray = array(
  '52' => "Գեներալի աղջիկը",
  '53' => "Անուրջներ",
  '54' => "Դժվար ապրուստ",
  '55' => "Բանակում",
  '56' => "Կարգին սերիալ",
  '57' => "Հրեշտակների դպրոց",
  '58' => "Ջեմիկը",
  '59' => "Կյանքի կառուսել",
  '60' => "Եղբայրներ",
  '61' => "Ոստիկաններ",
  '62' => "Վերվարածներն ընտանիքում",
  '63' => "Մի ստիր",
  '64' => "Անծանոթը",
  '65' => "Տիգրանի մոլորակը",
  '66' => "Եռաչափ սեր"
);

foreach($serialArray as $key=>$value) {
    $posts = $db->fetchAll("SELECT nid FROM serial WHERE name='".$value."'");
    foreach($posts as $post) {
        $id = (int)$post['nid'];
        $db->update('node', array('type' => $key), "nid=$id");
    }
}*/
////////////////////////////////////////////////////// TV PROGRAMS PART ////////////////////////////////////////////////////
/*$programArray = array(
  '68' => "Կիսաբաց լուսամուտներ",
  '69' => "Ազատ գոտի",
  '70' => "32 ատամ",
  '71' => "Քարից փափուկ",
  '72' => "ինչ որտեղ երբ",
  '73' => "Կենդանի մատյան",
  '74' => "Հայացք ներսից",
  '75' => "02",
  '76' => "Ուլտրամութ",
  '77' => "Vitamin ակումբ",
  '78' => "Երգ երգոց",
  '79' => "Մի վնասիր",
  '80' => "BLEF",
  '81' => "Popհանրագիտարան",
  '82' => "Sex - ը փոքր քաղաքում",
  '83' => "Աշխարհի հայերը",
  '84' => "Չէին սպասում",
  '85' => "Երկրի գանձերը",
  '86' => "Ժողովրդական երգիչ",
  '87' => "Գեղեցկության ֆորում"
);

foreach($programArray as $key=>$value) {
    $posts = $db->fetchAll("SELECT nid FROM tv_programs WHERE name='".$value."'");
    foreach($posts as $post) {
        $id = (int)$post['nid'];
        $db->update('node', array('type' => $key), "nid=$id");
    }
}*/
////////////////////////////////////////////////////// XOHANOC PART ////////////////////////////////////////////////////
/*$xohanocArray = array(
  '89' => "Աղցաններ",
  '92' => "Կարկանդակներ",
  '91' => "Թխվածքներ",
  '90' => "Անուշեղեն",
  '93' => "Ըմպելիքներ",
  '94' => "Ճաշատեսակներ",
  '95' => "Պահածոներ",
  '96' => "Պիցցա",
  '97' => "Սենդվիչներ"
);

foreach($xohanocArray as $key=>$value) {
    $posts = $db->fetchAll("SELECT nid FROM xohanoc WHERE name='".$value."'");
    foreach($posts as $post) {
        $id = (int)$post['nid'];
        $db->update('node', array('type' => $key), "nid=$id");
    }
}*/
?>
    </body>
</html>

