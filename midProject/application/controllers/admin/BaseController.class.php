<?php
//基础控制器
class BaseController extends Controller{
    //构造方法
    public function __construct(){
        $this->checklogin();
    }

    //验证用户是否登陆
    public function checklogin(){
        //只需要检测session就可以了
        if (empty($_SESSION['admin'])) {
            //说明没有登陆 ，需要给出提示 提示用户登录
            $this->jump('index.php?p=admin&c=login&a=login',"你还没有登陆",3);
        }
    }
}
