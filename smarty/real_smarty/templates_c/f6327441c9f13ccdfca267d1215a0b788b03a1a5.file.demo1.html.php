<?php /* Smarty version Smarty-3.1.16, created on 2016-09-26 23:02:01
         compiled from ".\templates\demo1.html" */ ?>
<?php /*%%SmartyHeaderCode:1966257e93869ce0a98-58318848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6327441c9f13ccdfca267d1215a0b788b03a1a5' => 
    array (
      0 => '.\\templates\\demo1.html',
      1 => 1474902003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1966257e93869ce0a98-58318848',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'sex' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57e93869d2b477_14737748',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57e93869d2b477_14737748')) {function content_57e93869d2b477_14737748($_smarty_tpl) {?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        锄禾日当午，
汗滴禾下土。
谁知盘中餐，
粒粒皆辛苦。
<hr>
姓名：<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
<br>
性别：<?php echo $_smarty_tpl->tpl_vars['sex']->value;?>



<!--疑是地上霜-->
    </body>
</html>

<?php }} ?>
