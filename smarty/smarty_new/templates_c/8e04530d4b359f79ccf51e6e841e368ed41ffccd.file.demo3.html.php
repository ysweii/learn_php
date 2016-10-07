<?php /* Smarty version Smarty-3.1.16, created on 2016-10-02 20:33:24
         compiled from ".\templates\demo3.html" */ ?>
<?php /*%%SmartyHeaderCode:3167257f0fe94776459-26372027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e04530d4b359f79ccf51e6e841e368ed41ffccd' => 
    array (
      0 => '.\\templates\\demo3.html',
      1 => 1475411580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3167257f0fe94776459-26372027',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stu' => 0,
    'emp' => 0,
    'teacher' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57f0fe94a4efa6_88519937',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57f0fe94a4efa6_88519937')) {function content_57f0fe94a4efa6_88519937($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>supply a title</title>
	<meta charset="utf-8">

</head>
<body>

	<?php echo $_smarty_tpl->tpl_vars['stu']->value[0];?>
<br>
	<?php echo $_smarty_tpl->tpl_vars['stu']->value[0];?>
<br>

	<hr>
	<?php echo $_smarty_tpl->tpl_vars['emp']->value['name'];?>
<br>
	<?php echo $_smarty_tpl->tpl_vars['emp']->value['name'];?>
<br>
	<hr>

	<?php echo $_smarty_tpl->tpl_vars['teacher']->value[0]['name'];?>
<br>
	<?php echo $_smarty_tpl->tpl_vars['teacher']->value[0]['name'];?>
<br>
	<?php echo $_smarty_tpl->tpl_vars['teacher']->value[0]['name'];?>
<br>
	<?php echo $_smarty_tpl->tpl_vars['teacher']->value[0]['name'];?>
<br>


</body>
</html><?php }} ?>
