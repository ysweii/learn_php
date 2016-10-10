<?php 

$animal = array('east'=>'tiger','north'=>'wolf','south'=>'monkey');

$jn_animal = json_encode($animal);

$aml = json_decode($jn_animal,true);
var_dump($aml);

echo "<br>";


//$jn_str = "{'first':'xiaoming','second':'wangwu','three':'linken'}";
//
$jn_str = '{"first":"xiaoming","second":"wangwu","three":"linken"}';
var_dump(json_decode($jn_str,true));


 ?>