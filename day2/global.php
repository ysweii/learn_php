<?php
$v1 = 10;
$v2 = 20;
function f1(){
	$v3 = 30;
	$v4 = 40;
}
f1();
echo "<pre>数组的值为：<br>";
var_dump($GLOBALS);
echo "</pre>";
?>