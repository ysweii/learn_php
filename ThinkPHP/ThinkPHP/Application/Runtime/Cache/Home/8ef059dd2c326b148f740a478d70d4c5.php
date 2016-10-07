<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    你的成绩是：<?php echo ($score); ?><br>
    <?php if($score >= 90): ?>孩子，你是我的骄傲
    <?php elseif($score >= 80): ?>
        孩子，考的不错
    <?php elseif($score >= 70): ?>
        你离优秀不远了
    <?php elseif($score >= 60): ?>
        你还要继续烟加油
    <?php else: ?>
        看来你需要努力了<?php endif; ?>


    <?php $__FOR_START_6701__=1;$__FOR_END_6701__=100;for($a=$__FOR_START_6701__;$a < $__FOR_END_6701__;$a+=10){ echo ($a); ?> : 锄禾日当午 <br><?php } ?>





</body>
</html>