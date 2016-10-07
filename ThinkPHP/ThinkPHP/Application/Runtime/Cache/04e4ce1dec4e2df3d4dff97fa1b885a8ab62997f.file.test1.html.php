<?php /* Smarty version Smarty-3.1.6, created on 2016-10-04 14:14:24
         compiled from "./Application/Home/View\Index\test1.html" */ ?>
<?php /*%%SmartyHeaderCode:1704657f345929b4154-43418863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04e4ce1dec4e2df3d4dff97fa1b885a8ab62997f' => 
    array (
      0 => './Application/Home/View\\Index\\test1.html',
      1 => 1475561660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1704657f345929b4154-43418863',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57f34592c01af',
  'variables' => 
  array (
    'score' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57f34592c01af')) {function content_57f34592c01af($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    你的成绩是：<?php echo $_smarty_tpl->tpl_vars['score']->value;?>
<br>
    <!--<if condition='$score egt 90'>-->
        <!--孩子，你是我的骄傲-->
    <!--<elseif condition='$score egt 80'/>-->
        <!--孩子，考的不错-->
    <!--<elseif condition='$score egt 70'/>-->
        <!--你离优秀不远了-->
    <!--<elseif condition='$score egt 60'/>-->
        <!--你还要继续烟加油-->
    <!--<else/>-->
        <!--看来你需要努力了-->
    <!--</if>-->

    <?php if ($_smarty_tpl->tpl_vars['score']->value>=90){?>
        孩子，你是我的骄傲1111
    <?php }elseif($_smarty_tpl->tpl_vars['score']->value>=80){?>
        孩子，考的不错222
    <?php }elseif($_smarty_tpl->tpl_vars['score']->value>=70){?>
        你离优秀不远3333
    <?php }else{ ?>
        你需要努力了444
    <?php }?>



</body>
</html><?php }} ?>