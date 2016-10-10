<?php 

$color = array('red','blue','green');
echo json_encode($color),"<br/>";


$animal = array('east'=>'tiger', 'north'=>'wolf','south'=>'monkey');
echo json_encode($animal),"<br/>";

$animal2 = array('east'=>'tiger', 'north'=>'wolf','duck','south'=>'monkey');
echo json_encode($animal2),"<br/>";



class Person{
	public $addr = 'shenzhen';
	public $height = 170;
	public function study(){
		echo "xuexi";
	}
}

$tom = new Person();
echo json_encode($tom);

 ?>