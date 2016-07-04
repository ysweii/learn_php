<?php
$v1 = 123;
$r1 = decbin($v1);
echo "r1 = $r1  类型是：".gettype($r1);

echo "<br/>";
$v2 = 178;
$r2 = decoct($v2);
echo "r2 = $r2  类型是".gettype($r2);

$v3 = 178;
$r3 = dechex($v3);
echo "<br/>r3 = $r3  类型是；".gettype($r3);

echo "<br/>";
$n1 = "1010110";
$s1 = bindec($n1);//二进制转十进制
echo "s1 = $s1, 类型是：".gettype($s1);

echo "<br/>";
$n2 = "1234";
$s2 = octdec($n2);//八进制转十进制
echo "s2 = $s2 类型是：".gettype($s2);

echo "<br/>";
$n3 = "12ab";
$s3 = hexdec($n3);
echo "s3 = $s3,类型是：".gettype($s3);


echo "<h3>".bindec(123)."</h3>";
echo "<h3>".bindec(0123)."</h3>";
echo "<h3>".bindec("0123")."</h3>";
echo "<h3>".octdec(0123)."</h3>";
?>