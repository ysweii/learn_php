<?php
class Person{
	public $name ="匿名";
	public $age = 18;
	public function info(){
		echo "hello";
		echo "woshi".$this->name;
		echo "nianjishi".$this->age;
	}
}

$person1 = new Person();
$person1->name = "小明";
$person1->age = 22;
$person1->info();

?>