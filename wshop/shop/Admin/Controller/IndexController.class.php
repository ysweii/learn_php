<?php
/**
 * Created by PhpStorm.
 * User: weics
 * Date: 2016/10/17
 * Time: 22:52
 */

namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller{
    function head(){
//        echo __DIR__;
//        echo $_SERVER['SERVER_NAME'];
        $this->display();


    }

    function left(){
        $this->display();
    }

    function right(){
        $this->display();
    }

    function index(){
        $this->display();
    }
}

