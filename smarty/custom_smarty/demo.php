<?php

$title = "锄禾";
$content = "床前明月光，疑是地上霜，举头望明月，低头思故乡";

$str = file_get_contents('./demo.html');
$str = str_replace('{', '<?php echo $', $str);
$str = str_replace('}', ';?>', $str);

file_put_contents('./demo.html.php', $str);

require './demo.html.php';



