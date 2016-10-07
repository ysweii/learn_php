<?php
namespace Components;
use Think\Controller;
class AdminController extends Controller{
    public function __construct(){
        parent::__construct();
        $mg_id = session('mg_id');
        if (empty($mg_id)){
            echo '<script type="text/javascript">';
            echo 'window.top.location.href="/index.php/admin/Login/login"';
            echo '</script>';
            exit();
        }

        $controller = strtolower(CONTROLLER_NAME);
        $all_allow_controller_array = array('login','manager');
        if (!in_array($controller,$all_allow_controller_array)){
            $now_ac = strtolower(CONTROLLER_NAME.'-'.ACTION_NAME);
            $manager = M('manager')->find($mg_id);
            $role = M('role')->find($manager['mg_role_id']);
            $role_auth_ac = $role['role_auth_ac'];
            if (stripos($role_auth_ac,$now_ac) === false){
                echo "<meta charset=utf-8>";
                die('没有此权限');
            }
//            var_dump($mg_id);
//            var_dump($all_allow_controller_array);
//            var_dump($now_ac);
//            exit();
        }
    }
}