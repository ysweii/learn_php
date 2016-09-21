<?php
//array_map 对数组中的每一个元素使用回调函数
$arr = array(1,2,3,4,5);
//求其平方
//定义一个函数，给定一个数，求其平方
function pf($num){
	return $num * $num;
}
$newArr = array_map('pf',$arr);

echo "<pre>";
var_dump($newArr);