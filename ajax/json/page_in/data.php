<?php 

header("content-type:text/html; charset=utf-8");
$link = mysql_connect('localhost','root','123');
mysql_select_db('shop',$link);
mysql_query('set names gbk');

include "./page.class.php";

$sql = "select * from sw_goods";
$qry = mysql_query($sql);
$total = mysql_num_rows($qry);
$per = 7;

$page = new Page($total,$per);

$sql3 = "select goods_number, goods_name,goods_price,goods_weight from sw_goods order by goods_id ".$page->limit;

$qry3 = mysql_query($sql3);

$page_list = $page->fpage(array(3,4,5,6,7,8));

$page_num = isset($_GET['page'])? $_GET['page']:1;
$num = ($page_num -1)*$per + 1;

$info = array();
while($rst3 = mysql_fetch_assoc($qry3)){
	$rst3['number'] = $num++;
	$info[] = $rst3;
}

$info[] = $page_list;
echo "<pre>";
var_dump($info);

echo json_encode($info);

 ?>