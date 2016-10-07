<?php /* Smarty version Smarty-3.1.16, created on 2016-10-01 22:50:48
         compiled from ".\templates\demo1.html" */ ?>
<?php /*%%SmartyHeaderCode:1022357efcd4812de18-47173032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6327441c9f13ccdfca267d1215a0b788b03a1a5' => 
    array (
      0 => '.\\templates\\demo1.html',
      1 => 1475333405,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1022357efcd4812de18-47173032',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57efcd481a7948_78502699',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57efcd481a7948_78502699')) {function content_57efcd481a7948_78502699($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>to do supply a title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php echo $_GET['name'];?>
<br>
	<?php echo $_SESSION['country'];?>
<br>
	<?php echo $_COOKIE['school'];?>
<br>
	<?php echo @constant('city');?>
<br>
	<?php echo $_SERVER['REMOTE_ADDR'];?>
<br>
	<?php echo time();?>
<br>
	<?php echo 'Smarty-3.1.16';?>
<br>
	<?php echo '{';?>
<br>
	<?php echo '}';?>


</body>
</html><?php }} ?>
