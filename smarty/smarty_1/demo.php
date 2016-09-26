<?php

require './Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('title','锄禾');
$smarty->assign('content','锄禾日当午，汗滴禾下土。谁知盘中餐，粒粒皆辛苦。');
$smarty->complie();

