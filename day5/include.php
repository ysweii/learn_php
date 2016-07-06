<?php
set_include_path("F:\Project\php\day2");

$path = get_include_path();
$path_new = $path.PATH_SEPARATOR."F:\Project\php\day2";

set_include_path($path_new);

echo "<p>当前的工作目录是：".getcwd().'</p>';


include './day2/changliang.php';
include 'changliang.php';
?>