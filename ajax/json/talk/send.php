<?php 

$link = mysql_connect('localhost','root','123');
mysql_select_db('test',$link);
mysql_query('set names utf8');

$msg 		= $_POST['msg'];
$color 		= $_POST['color'];
$biaoqing 	= $_POST['biaoqing'];
$receiver	= $_POST['receiver'];

$sql = "insert into message values (null,'$msg','admin','$receiver','$color','$biaoqing',now())";

if (mysql_query($sql)) {
	echo "发表聊天成功";
	# code...
} else {
	echo "发表聊天失败";
}


 ?>