<?php
/**
 * Created by PhpStorm.
 * User: weics
 * Date: 2016/10/3
 * Time: 20:59
 */
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller{
    public function index(){
        $this->display();
    }

    public function show(){
//        echo '<meta charset=utf-8/>';
//        echo '当前的请求地址：'.__SELF__.'<br>';
//        echo '当前的分组：'.__MODULE__.'<br>';
//        echo '当前的控制器：'.__CONTROLLER__.'<br>';
//        echo '当前的方法：'.__ACTION__;
        $this->display();

    }


}