<?php
namespace Admin\Controller;
use Components\AdminController;
use Model\RoleModel;

class RoleController extends AdminController{
    public function showlist(){
        $list = M('role')->select();
        $this->assign('list',$list);
        $this->display();
    }

    //分配权限的方法
    public function distribute($role_id){
        if ($role_id == 0){
            //是超级用户   不能修改权限
            die('参数不正确');
        }

        $role = new RoleModel();
        if (IS_POST){
            $model = new RoleModel();
            if ($model->updateRole($_POST['auth'],$role_id)){
                $this->success('修改成功',U('showlist'),10);
            } else {
                $this->error('修改错误');
            }
            exit();
        }

        $role_info = $role->find($role_id);

        $role_auth_ids = $role_info['role_auth_ids'];
        $role_auth_id_array = explode(',',$role_auth_ids);

        $info1 = M('auth')->where('auth_level = 0')->select();
        $info2 = M('auth')->where('auth_level = 1')->select();
//        echo "<pre>";
//        var_dump($role_info);
//        var_dump($info1);
//        var_dump($info2);
//        var_dump($role_auth_id_array);


        $this->assign('role_auth_id_array',$role_auth_id_array);
        $this->assign('info1',$info1);
        $this->assign('info2',$info2);
        $this->display();
    }
}






















