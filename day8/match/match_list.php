<?php
header('Content-Type: text/html; charset=utf-8');

$config = array('host' => '127.0.0.1',
	'port' => '3306',
	'username' => 'root',
	'password' => '123',
	'charset' => 'utf8',
	'dbname' => 'match'
	);

require './MySQLDB.class.php';
$dao = MySQLDB::getInstance($config);

$sql = "select t1.t_name as t1_name, m.t1_score, m.t2_score, t2.t_name as t2_name, m.m_time from `match` as m left join `team` as t1 ON m.t1_id = t1.t_id left join `team` as t2 ON m.t2_id = t2.t_id;";
$match_list = $dao ->getAll($sql);
?>

<!-- 利用HTML代码展示数据 -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>比赛列表</title>
</head>
<body>
<table>
	<tr>
		<th>球队一</th><th>比分</th><th>球队二</th><th>时间</th>
	</tr>
	<?php foreach ($match_list as $row) : ?> 
	<tr>
		<td><?php echo $row['t1_name'];?></td>
		<td><?php echo $row['t1_score'];?>:<?php echo $row['t2_score'];?></td>
		<td><?php echo $row['t2_name'];?></td>
		<td><?php echo date('Y-m-d H:i',$row['m_time']);?></td>
	</tr>
	<?php endForeach;?>
</table>


</body>
</html>
