<?php
$v1 = (int)7.8;
$v2 = (float)$v1;
echo "<br/>v1的值为：$v1,类型为：".gettype($v1);
echo "<br/>v2的值为：$v2,类型为：".getType($v2);

$v1 = (int)7.8;
$v2 = (float)$v1;
settype($v1, "float");
echo "<br/>v1的值为：$v1,类型为：".getType($v1);
?>