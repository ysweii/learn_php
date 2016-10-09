<?php
/**
 * Created by PhpStorm.
 * User: weics
 * Date: 2016/10/3
 * Time: 22:13
 */

namespace Admin\Controller;
use Think\Controller;
use Think\Verify;

class LoginController extends Controller{
    public function login(){

        $this->display();
    }

    public function checkName($name){
        $rst = M('manager')->where("mg_name='$name'")->find();
        if ($rst === null){
            echo "<span style='color:green'>恭喜可以使用</span>";
        } else {
            echo  "<span style='color:red'>不能使用</span>";
        }
    }



    public function checkUser(){
        $obj = new Verify();
        if ($obj->check(I('post.captcha','','trim'))){
            $data['mg_name'] = I('post.admin_user');
            $data['mg_pwd'] = I('post.admin_psd');

            $row = M('manager')->where($data)
                ->find();

            if ($row){
                session('mg_id',$row['mg_id']);
                $this->redirect('Manager/index');
            } else {
                $this->error('用户名或者密码错误',U('login'),3);
            }

        } else {
            $this->error('验证码错误',U('login'),3);
        }
    }


    public function verifyImg(){
        $config = array(
            'imageW'    =>  120,
            'imageH'    =>  40,
            'fontSize'  =>  15,
            'length'    =>  4,
            'fontttf'   =>  '4.ttf'
        );

        $obj = new \Think\Verify($config);
        $obj->entry();
    }
    
    
    public function test1(){
//        $obj = new ManagerController();
//        $obj->managertest1();
//        $obj = A('Manager');
//        $obj->test2();
//         R('Manager/managertest1');
        echo C('DB_HOST');
    }
    
}