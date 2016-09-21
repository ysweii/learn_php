<?php
//表示登陆的控制类
class LoginController extends Controller{
    public function loginAction(){
        include CUR_VIEW_PATH . "login.html";
    }


    //处理用户的登陆的动作
    public function signinAction(){
        //0 check the captcha
        $captcha = trim($_POST['captcha']);
        if (strtolower($captcha) != $_SESSION['captcha']) {
            $this->jump("index.php?p=admin&c=login&a=login","别水了",3);
        }



        //1获取用户的用户名和密码
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        //2验证和处理数据
        //$username = addslashes($username);
        //$password = addslashes($password);
        $this->helper('input');
        $username = deepslashes($username);
        $password = deepslashes($password);
        //3 调用模型来对数据进行验证  并且给出提示
        $adminModel = new adminModel("admin");
        $userinfo = $adminModel->checkUser($username,$password);
        if (empty($userinfo)) {
            //表示不存在该用户
            $this->jump("index.php?p=admin&c=login&a=login",'用户不存在,密码和用户名错误',3);
        } else {
            // 存在该用户
            $_SESSION['admin'] = $userinfo;
            $this->jump("index.php?p=admin&c=index&a=index","",0);
        }
    }


    //注销操作
    public function logoutAction(){
        //销毁session
        unset($_SESSION['admin']);
        session_destroy();
        $this->jump('index.php?p=admin&c=login&a=login','',0);
    }

    public function captchaAction(){
        //载入验证码类
        $this->library("Captcha");
        //实例化验证码类 并调用方法生成验证码
        $captcha = new Captcha();
        $captcha->generateCode();
        //保存到session中
        $_SESSION['captcha'] = $captcha->getCode();
    }














}
