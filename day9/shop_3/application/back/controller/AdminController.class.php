<?php

//后台管理员的相关操作
class AdminController extends Controller {
	//登陆表单的操作
	public function loginAction(){
		//载入当前的视图层
		require CURRENT_VIEW_PATH . 'login.html';
	}
}