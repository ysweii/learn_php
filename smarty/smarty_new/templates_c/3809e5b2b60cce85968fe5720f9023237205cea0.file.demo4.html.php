<?php /* Smarty version Smarty-3.1.16, created on 2016-10-02 21:11:16
         compiled from ".\templates\demo4.html" */ ?>
<?php /*%%SmartyHeaderCode:2237057f10350e8ea14-66293543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3809e5b2b60cce85968fe5720f9023237205cea0' => 
    array (
      0 => '.\\templates\\demo4.html',
      1 => 1475413867,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2237057f10350e8ea14-66293543',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57f103511c58c1_59635700',
  'variables' => 
  array (
    'stu' => 0,
    'k' => 0,
    'v' => 0,
    'score' => 0,
    'socre' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57f103511c58c1_59635700')) {function content_57f103511c58c1_59635700($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>todo supply a title</title>
	<meta charset="utf-8">
	<style type="text/css">
	.first{
		background-color: #F90;
	}
	.last{
		background-color: #fff;
	}
	.even{
		background-color: #0ff;
	}
	</style>


</head>
<body>

	<table width="500" border="1" bordercolor="#000" align="center">
		<tr>
			<th>是否是第一个元素</th>
			<th>编号</th>
			<th>索引</th>
			<th>键</th>
			<th>值</th>
			<th>是否是最后一个元素</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['stu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['v']->iteration=0;
 $_smarty_tpl->tpl_vars['v']->index=-1;
 $_smarty_tpl->tpl_vars['v']->show = ($_smarty_tpl->tpl_vars['v']->total > 0);
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['v']->iteration++;
 $_smarty_tpl->tpl_vars['v']->index++;
 $_smarty_tpl->tpl_vars['v']->first = $_smarty_tpl->tpl_vars['v']->index === 0;
 $_smarty_tpl->tpl_vars['v']->last = $_smarty_tpl->tpl_vars['v']->iteration === $_smarty_tpl->tpl_vars['v']->total;
?>
		<?php if ($_smarty_tpl->tpl_vars['v']->first) {?>
			<tr class="first">
		<?php } elseif ($_smarty_tpl->tpl_vars['v']->last) {?>
			<tr class="last">
		<?php } elseif ($_smarty_tpl->tpl_vars['v']->iteration%2==0) {?>
			<tr class="even">
		<?php } else { ?>
			<tr>
		<?php }?>
			<td><?php echo $_smarty_tpl->tpl_vars['v']->first;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['v']->iteration;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['v']->index;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['v']->last;?>
</td>
		</tr>
		<?php }
if (!$_smarty_tpl->tpl_vars['v']->_loop) {
?>
			没有此数组
		<?php } ?>
	</table>

	一共有<?php echo $_smarty_tpl->tpl_vars['v']->total;?>
条记录<br>
	数组中是否有元素：<?php echo $_smarty_tpl->tpl_vars['v']->show;?>


	<hr>

	    you score is : <?php echo $_smarty_tpl->tpl_vars['score']->value;?>
<br>
	<?php if ($_smarty_tpl->tpl_vars['score']->value>=90) {?>
		孩子，你是我的骄傲
	<?php } elseif ($_smarty_tpl->tpl_vars['score']->value>=80) {?>
    	好样的，宝贝
	<?php } elseif ($_smarty_tpl->tpl_vars['score']->value>=70) {?>
     	你离优秀不远了
	<?php } elseif ($_smarty_tpl->tpl_vars['score']->value>=60) {?>
      	您还是有潜力的
	<?php } else { ?>
       	看来你不努力是不行了
	<?php }?>

	<!--  您的成绩是<?php echo $_smarty_tpl->tpl_vars['score']->value;?>
<br>
    <?php if ($_smarty_tpl->tpl_vars['score']->value>=90) {?>
    	孩子，你是我的骄傲
    <?php } elseif ($_smarty_tpl->tpl_vars['score']->value>=80) {?>
    	好样的，宝贝
    <?php } elseif ($_smarty_tpl->tpl_vars['socre']->value>=70) {?>
     	你离优秀不远了
    <?php } elseif ($_smarty_tpl->tpl_vars['socre']->value>=60) {?>
      	您还是有潜力的
    <?php } else { ?>
       	看来你不努力是不行了
    <?php }?> -->



</body>
</html><?php }} ?>
