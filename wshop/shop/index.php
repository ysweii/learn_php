<?php

header("content-type:text/html;charset=utf-8");

define('APP_DEBUG',true);

//define('SITE_URL','http://www.guagua.com/wshop/');

define('SITE_URL',"http://".$_SERVER['SERVER_NAME']."/wshop/"); 


define('ADMIN_CSS_URL',SITE_URL.'shop/Admin/Public/css/');
define('ADMIN_IMG_URL',SITE_URL.'shop/Admin/Public/img/');
define('ADMIN_JS_URL',SITE_URL.'shop/Admin/Public/js/');


include "../ThinkPHP/ThinkPHP.php";