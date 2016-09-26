<?php

require './smarty.class.php';
$smarty = new Smarty();
$smarty->assign('title','锄禾');
$smarty->assign('content', '这是一段测试的文字');

$smarty->complie('demo.html');


