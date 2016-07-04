<?php
$s1 = "ABC";
$s2 = "ABc";
$s3 = "XYZ";
$s4 = "XZZ";
$s5 = "89Z";
$s1++;
$s2++;
$s3++;
$s4++;
$s5++;

echo "s1 = $s1,s2=$s2,s3= $s3";
echo ",s4 = $s4,s5 = $s5";
echo "<hr/>";
echo "<hr/>";

$n1 = 10;
$n2 = 10;
$n1++;
++$n2;
echo "<br/>n1= $n1,n2=$n2";
$s1 = $n1++;
$s2 = ++$n2;

echo "<br/>n1 =$n1,n2=$n2";
echo "<br/>s1 = $s1,s2 = $s2";
echo "<br/>",$n1++,",",++$n2;
echo "<br/>n1 = $n1,n2 = $n2";
?>