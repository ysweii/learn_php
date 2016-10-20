<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Think\Controller;

class ManagerController extends Controller{
    public function login(){
        
        if(!empty($_POST)){
            //手机表单数据
            $very = new \Think\Verify();
            if($very->check($_POST['captcha'])){
                $nm = $_POST['admin_user'];
                $pw = $_POST['admin_psd'];
                $user = new \Model\UserModel('manager');
                $info = $user->checkNamePwd($nm,$pw);
                //var_dump($info);
                if($info){
                    session('admin_user',$info['mg_name']);
                    session('admin_id',$info['mg_id']);
                    $this->redirect('Index/index');
                }
                
            }
            echo "验证码错误";
        }
        $this->display();
    }
    
    public function logout(){
        session(null);
        $this->redirect('login');
    }
    
    
    
    
    
    public function verifyImg(){
        $config = array(
            'imageH'    =>  40,               // 验证码图片高度
            'imageW'    =>  120,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontSize'  =>  15,
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
        
        $very = new \Think\Verify($config);
        echo  $very->entry();
    }
        
}

