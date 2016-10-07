<?php 
require './Smarty/Smarty.class.php';
$smarty = new Smarty();

$smarty->assign('stu',array('李白','tom','jack','lusi','simon'));
$smarty->display('demo5.html');

 ?>