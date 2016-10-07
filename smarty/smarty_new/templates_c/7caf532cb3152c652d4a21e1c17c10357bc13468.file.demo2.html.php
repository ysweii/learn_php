<?php /* Smarty version Smarty-3.1.16, created on 2016-10-01 23:32:25
         compiled from ".\templates\demo2.html" */ ?>
<?php /*%%SmartyHeaderCode:308857efd4e54f8214-64745275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7caf532cb3152c652d4a21e1c17c10357bc13468' => 
    array (
      0 => '.\\templates\\demo2.html',
      1 => 1475335939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '308857efd4e54f8214-64745275',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57efd4e5545283_29185004',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57efd4e5545283_29185004')) {function content_57efd4e5545283_29185004($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>todo supply a title </title>
	<meta charset="utf-8">
	<?php  $_config = new Smarty_Internal_Config('smarty.conf', $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars('style1', 'local'); ?>
	
		<style type="text/css">
		div{ width: 200px;height:100px;border:#0c3 solid 1px ;background-color:#666; }
	</style>
	
	
</head>
<body>
	<?php echo $_smarty_tpl->getConfigVariable('host');?>
<br>
	<?php echo $_smarty_tpl->getConfigVariable('username');?>
<br>
	<?php echo $_smarty_tpl->getConfigVariable('pwd');?>

	<hr>
	<div></div>

</body>
</html><?php }} ?>
