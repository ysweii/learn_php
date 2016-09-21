<?php

//后台管理员的相关操作
class AdminController extends Controller {
	//登陆表单的操作
	public function loginAction(){
		//载入当前的视图层
		require CURRENT_VIEW_PATH . 'login.html';
	}

	//验证管理员是否合法
	public function checkAction(){
		//获取表单数据
		$admin_name = $_POST['username'];
		$admin_pass = $_POST['password'];

		//从数据库中验证管理员是否存在合法
		$m_admin = Factory::M('AdminModel');
		if ($m_admin->check($admin_name,$admin_pass)){
			//验证通过，合法
			echo '合法，直接跳转后台首页';
		} else {
			//非法
			echo '非法，提示';
		}
	}
}