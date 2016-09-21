<?php

/**
 * 后台管理员相关操作(登录，退出，找回密码，管理员增删改查，权限控制）控制器类
 */
class AdminController extends Controller {
	/**
	 * 登录表单动作
	 */
	public function loginAction() {
		//载入当前的视图层模板
		require CURRENT_VIEW_PATH . 'login.html';
	}
}