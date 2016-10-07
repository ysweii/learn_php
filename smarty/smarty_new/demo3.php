<?php 
require './Smarty/Smarty.class.php';
$smarty = new Smarty();
//定义数组
$smarty->assign('stu',array('tom','berry','ketty'));
$smarty->assign('emp',array('name'=>'李白','sex'=>'男'));
$smarty->assign('teacher',array(array('name'=>'李白','sex'=>'男'), 
		array('name'=>'杜甫','sex'=>'女')));
$smarty->display('demo3.html');

 ?>