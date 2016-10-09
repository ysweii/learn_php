<?php 

header("Cache-Controller:no-cache");
header("Pragma:no-cache");
header("Expires:-1");


$fp = fopen('09.txt','a');
fwrite($fp, 'computer\n');
fclose($fp);
echo 'haha';

 ?>