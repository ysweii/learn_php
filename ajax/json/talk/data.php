<?php

$link = mysql_connect('localhost','root','123');
mysql_select_db('test',$link);
mysql_query('set names utf8');

$maxID = $_GET['maxID'];

$sql = "select * from message where id>'$maxID'";

$qry = mysql_query($sql);

$info = array();
while($rst = mysql_fetch_assoc($qry)){
	$info[] = $rst;
}

echo json_encode($info);