<?php 
require './Smarty/Smarty.class.php';
$smarty = new Smarty();
$_SESSION['country'] = 'china';
setcookie('school','hubei university');
define('city','beijing');
$smarty->display('demo1.html');