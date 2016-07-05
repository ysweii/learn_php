<?php
const D1 = 1;
const D2 = 2;
const D3 = 4;
const D4 = 8;
const D5 = 16;

$state = 13;

//需求1：判断灯泡的状态
$r1 = $state & D1;
if ($r1) {
	echo "<br/>灯1亮";
} else {
	echo "<br/>灯1灭";
}

//需求2：
$r2 = $state & D2;
if ($r2 > 0) {
	echo "<br/>灯2亮";
} else {
	echo "<br/>灯2灭";
}

echo "<br/>实际的总状态是：";
showAll($state);

$state = $state | D2;
echo "打开第2个灯泡之后：";
showAll($state);

$state = $state & ~D1;
$state = $state & ~D2;
echo "关闭第1和2个灯泡";
showAll($state);

function showAll($state){
	echo "<p>";
	for ($i = 1; $i<= 5; ++$i){
		$temp = "D".$i;
		$r1 = $state & constant($temp);
		if ($r1 > 0) {
			echo "灯{$i}亮";
		} else {
			echo "灯{$i}灭";
		}
	}
	echo "</p>";
}

?>