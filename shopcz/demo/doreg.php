<?php
//获取用户名
$username = $_GET['username'];
// 对用户名进行检测，查看是否可用，只需要连接数据库并查询即可
$message = "";

if ($username == "admin"){
	$message = "对不起，该用户已被占用！";
} else {
	$message = "恭喜您，该用户名可用！";
}
//在子页面中编写js代码操作父页面，通过php输出一段js代码
echo <<<STR
<script type="text/javascript">
	window.parent.document.getElementById("message").innerHTML = "$message";
</script>
STR;
