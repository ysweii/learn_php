<?php

$v1 = 8.1/3;
echo "<br/>php中的8.1/3结果为：".$v1;
echo "<br/>";
if ($v1 < 2.7) {
	echo "php中的8.1/3小于2.7";
}
echo "<br/>";
if (round($v1 *1000) == round(2.7 * 1000)) {
	echo "php中的8.1/3等于2.7(按照三位精度)";
} else {
	echo "php中的8.1/3不等于2.7(按照三位精度)";
}
?>