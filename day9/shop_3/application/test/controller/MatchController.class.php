<?php
//比赛操作的相关控制器功能类
class MatchController extends Controller {
	//比赛列表操作
	public function listAction(){
		//通过工厂类获得对象
		$m_match = Factory::M('MatchModel');
		$match_list = $m_match->getList();

		//载入负责显示的html文件
		require CURRENT_VIEW_PATH .'match_list_v.html';
	}

	//比赛删除
	public function removeAction(){
		echo "比赛控制器深处动作执行了";
	}
}