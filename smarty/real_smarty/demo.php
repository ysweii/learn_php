<?php

require './libs/Smarty.class.php';

$smarty = new Smarty();
//$smarty->setTemplateDir('.' .DS . 'view' . DS);
//$smarty->setCompileDir('.' . DS . 'view_c' . DS);

$smarty->assign('name','李白');
$smarty->assign('sex','男');
$smarty->display('demo1.html');

