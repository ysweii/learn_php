<?php
/**
 * Created by PhpStorm.
 * User: weics
 * Date: 2016/10/3
 * Time: 22:28
 */

namespace Admin\Controller;
use Components\AdminController;

class ManagerController extends AdminController{
    public function index(){
        $this->display();
    }

    public function head(){
        $this->display();
    }

    public function left(){
        $manager = M('manager')->find(session('mg_id'));
        //var_dump($manager);
        $role = M('role')->find($manager['mg_role_id']);//通过角色的id来获取角色的信息
        $auth_ids = $role['role_auth_ids'];
        if ($manager['mg_role_id'] == 0){
            // 是超级管理员
            $info1 = M('auth')->where("auth_level = 0")->select();
            $info2 = M('auth')->where("auth_level = 1")->select();
        } else {
            // 不是超级用户
            $info1 = M('auth')->where("auth_level = 0 and auth_id in ($auth_ids)")->select();
            $info2 = M('auth')->where("auth_level = 1 and auth_id in ($auth_ids)")->select();
        }
        $this->assign('info1',$info1);
        $this->assign('info2',$info2);
        $this->display();
    }

    public function right(){
        $this->display();
    }

}