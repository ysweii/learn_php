<?php 

if ($_FILES['user_pic']['erroe']>0) {
	exit('上传附件有问题，有可能没有附件');
}


$name  = $_FILES['user_pic']['name'];
$name = iconv('UTF-8','GB2312',$name);

$path = "./upload/";

if (move_uploaded_file($_FILES['user_pic']['tmp_name'],$path.$name)) {
	echo "success";
} else {
	echo "fail";
}

 ?>