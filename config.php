<?php

$db_params = 'host=>localhost;;user=>root;;pass=>;;dbname=>tvintern_online';
//$db_params = 'host=>localhost;;user=>root;;pass=>;;dbname=>news';

//$db_params = 'host=>localhost;;user=>armenia_news;;pass=>usatvnews123;;dbname=>armenia_news';

define('DB_PARAMS',$db_params);

define('LOG_QUERIES',false);

define('ROOT_URL', 'http://localhost/onlinetv');

define('ADMIN_URL', ROOT_URL.'/admin');

define('ROOT_DIRECTORY',$_SERVER['DOCUMENT_ROOT'].'/onlinetv');

?>
