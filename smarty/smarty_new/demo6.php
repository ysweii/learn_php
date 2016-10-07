<?php 
require './Smarty/Smarty.class.php';
$smarty = new Smarty();

// $smarty->assign('output',array('climb','readbook','swiming','read newspaper'));
// $smarty->assign('values',array('a','b','c','d'));

$smarty->assign('options',array('a'=>'climb','b'=>'readbook','c'=>'swimmming','d'=>'read newspaper'));


$smarty->assign('selected',array('a','c'));

$smarty->assign('selcted_radio','a');

$smarty->display('demo6.html');

 ?>