<?php


namespace China\Beijing\Haidian;
class Person{
    static $name = "李白<br>";
}






namespace USA\NewYork;
class Person{
    static $name = "aobama<br>";
}



echo '<meta charset=utf-8>';
echo Person::$name;
echo \China\Beijing\Haidian\Person::$name;
