<?php
define("CONST1",1);
define("C2","abc");
define("pi",3.14);

//使用常量
echo CONST1;

const C1 = 11;
echo "<br/> 常量C1的值为：".constant("C1");
$s1 = "C1";
echo "<br/> 常量C1的值为：".constant($s1);

if (C1 > 10) {
	//const C3 = 12;
}

?>