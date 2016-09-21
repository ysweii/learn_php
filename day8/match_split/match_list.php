<?php
header('Content-Type: text/html; charset=utf-8');

$config = array('host' => '127.0.0.1',
	'port' => '3306',
	'username' => 'root',
	'password' => '123',
	'charset' => 'utf8',
	'dbname' => 'match'
	);

require './MySQLDB.class.php';
$dao = MySQLDB::getInstance($config);

$sql = "select t1.t_name as t1_name, m.t1_score, m.t2_score, t2.t_name as t2_name, m.m_time from `match` as m left join `team` as t1 ON m.t1_id = t1.t_id left join `team` as t2 ON m.t2_id = t2.t_id;";
$match_list = $dao ->getAll($sql);


//载入显示的html文件
require './template/match_list_xianshi.html';



