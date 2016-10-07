<?php /* Smarty version Smarty-3.1.16, created on 2016-10-02 21:50:22
         compiled from ".\templates\demo6.html" */ ?>
<?php /*%%SmartyHeaderCode:403557f10e9b1c32b9-05020745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d25294c5d3c315c9f6a7c76628f2b24e29f1646' => 
    array (
      0 => '.\\templates\\demo6.html',
      1 => 1475416221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '403557f10e9b1c32b9-05020745',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57f10e9b3e7e34_08533845',
  'variables' => 
  array (
    'options' => 0,
    'selected' => 0,
    'selcted_radio' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57f10e9b3e7e34_08533845')) {function content_57f10e9b3e7e34_08533845($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_checkboxes')) include 'F:\\Project\\php\\smarty\\smarty_new\\Smarty\\plugins\\function.html_checkboxes.php';
if (!is_callable('smarty_function_html_radios')) include 'F:\\Project\\php\\smarty\\smarty_new\\Smarty\\plugins\\function.html_radios.php';
?><!DOCTYPE html>
<html>
<head>
	<title>todo supply title</title>
</head>
<body>

	

	favorite:  <?php echo smarty_function_html_checkboxes(array('options'=>$_smarty_tpl->tpl_vars['options']->value,'name'=>'hobby','selected'=>$_smarty_tpl->tpl_vars['selected']->value),$_smarty_tpl);?>
;

	<hr>

	favorite:  <?php echo smarty_function_html_checkboxes(array('options'=>$_smarty_tpl->tpl_vars['options']->value,'name'=>'hobby','selected'=>$_smarty_tpl->tpl_vars['selected']->value,'multiple'=>"multiple"),$_smarty_tpl);?>
;

	<hr>

	favorite:  <?php echo smarty_function_html_radios(array('options'=>$_smarty_tpl->tpl_vars['options']->value,'name'=>'hobby','selected'=>$_smarty_tpl->tpl_vars['selcted_radio']->value),$_smarty_tpl);?>

<!-- 
	<?php echo smarty_function_html_radios(array('options'=>$_smarty_tpl->tpl_vars['options']->value,'name'=>'hobby','selected'=>$_smarty_tpl->tpl_vars['selcted_radio']->value),$_smarty_tpl);?>
 -->

	



</body>
</html><?php }} ?>
