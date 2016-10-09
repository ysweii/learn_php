<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />
    <base href="http://www.guagua.com/ThinkPHP/ThinkPHP/"/>
    <title>用户登录</title>

    <link href="Application/Admin/Public/css/User_Login.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript">
        function checknm() {
            var nm = document.getElementById('admin_user').value;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4){
                    document.getElementById('username_result').innerHTML = xhr.responseText;
                }
            }
            xhr.open('get','/ThinkPHP/ThinkPHP/index.php/Admin/Login/checkName/name/'+nm);
            xhr.send(null);
        }

    </script>
</head><body id="userlogin_body">
<div></div>
<div id="user_login">
    <dl>
        <dd id="user_top">
            <ul>
                <li class="user_top_l"></li>
                <li class="user_top_c"></li>
                <li class="user_top_r"></li></ul>
        </dd><dd id="user_main">
        <form action="/ThinkPHP/ThinkPHP/index.php/Admin/Login/checkUser" method="post">
            <ul>
                <li class="user_main_l"></li>
                <li class="user_main_c">
                    <div class="user_main_box">
                        <ul>
                            <li class="user_main_text">用户名： </li>
                            <li class="user_main_input">
                                <input class="TxtUserNameCssClass" id="admin_user" maxlength="20" name="admin_user" onblur="checknm()"> </li>
                            <li class="username_result" id="username_result"></li>
                        </ul>
                        <ul>
                            <li class="user_main_text">密&nbsp;&nbsp;&nbsp;&nbsp;码： </li>
                            <li class="user_main_input">
                                <input class="TxtPasswordCssClass" id="admin_psd" name="admin_psd" type="password">
                            </li>
                        </ul>
                        <ul>
                            <li class="user_main_text">验证码： </li>
                            <li class="user_main_input">
                                <input class="TxtValidateCodeCssClass" id="captcha" name="captcha" type="text">
                                <img src="/ThinkPHP/ThinkPHP/index.php/Admin/Login/verifyImg"  onclick="this.src='/ThinkPHP/ThinkPHP/index.php/Admin/Login/verifyImg/'+Math.random()" alt=""/>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="user_main_r">

                    <input style="border: medium none; background: url('Application/Admin/Public/img/user_botton.gif') repeat-x scroll left top transparent; height: 122px; width: 111px; display: block; cursor: pointer;" value="" type="submit">
                </li>
            </ul>
        </form>
    </dd><dd id="user_bottom">
        <ul>
            <li class="user_bottom_l"></li>
            <li class="user_bottom_c"><span style="margin-top: 40px;"></span> </li>
            <li class="user_bottom_r"></li></ul></dd></dl></div><span id="ValrUserName" style="display: none; color: red;"></span><span id="ValrPassword" style="display: none; color: red;"></span><span id="ValrValidateCode" style="display: none; color: red;"></span>
<div id="ValidationSummary1" style="display: none; color: red;"></div>
</body>
</html>