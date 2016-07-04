<html>
<body>

<?php
echo "<table border='1'>";
foreach($_SERVER as $key => $value){
	echo "<tr>";
	echo "<td>$key</td>";
	echo "<td>$value</td>";
	echo "</tr>";
}
echo "</table>";
?>


</body>
</html>