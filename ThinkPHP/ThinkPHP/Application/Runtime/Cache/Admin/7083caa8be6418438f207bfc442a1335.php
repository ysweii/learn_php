<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <base href="http://www.guagua.com/ThinkPHP/ThinkPHP/"/>
    <title>会员列表</title>

    <link href="Application/Admin/Public/css/mine.css" type="text/css" rel="stylesheet" />
</head>
<body>
<style>
    .tr_color{background-color: #9F88FF}
</style>
<div class="div_head">
            <span>
                <span style="float: left;">当前位置是：商品管理-》商品列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="/ThinkPHP/ThinkPHP/index.php/Admin/Role/add">【添加角色】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px; margin: 10px 5px;">
    <table class="table_a" border="1" width="100%">
        <tbody><tr style="font-weight: bold;">
            <td>序号</td>
            <td>角色名称</td>
            <td>角色分配</td>
        </tr>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="product1">
                <td><?php echo ($i); ?></td>
                <td><?php echo ($vo["role_name"]); ?></td>
                <td><a href="/ThinkPHP/ThinkPHP/index.php/Admin/Role/distribute/role_id/<?php echo ($vo["role_id"]); ?>">权限分配</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <tr>
            <td colspan="20" style="text-align: center;">
                <?php echo ($pagestr); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>