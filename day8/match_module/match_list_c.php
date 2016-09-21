<?php
header('Content-Type: text/html; charset=utf-8');

require './Factory.class.php';
$m_match = Factory::M('MatchModel');
$match_list = $m_match->getList();

//载入显示的html文件
require './template/match_list_v.html';



