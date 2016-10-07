<?php 
require './Smarty/Smarty.class.php';

$smarty = new Smarty();
$smarty->assign('stu',array('S008'=>'李白','S004'=>'杜甫','S070'=>'白居易',
		'S056'=>'李清照','S068'=>'辛情急','S007'=>'李商隐'));
$smarty->assign('score',58);
$smarty->display('demo4.html');


 ?>