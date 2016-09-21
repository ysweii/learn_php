<?php

/**
 * 比赛操作相关控制器功能类
 */
class MatchController extends Controller {

	/**
	 * 比赛列表操作
	 */
	public function listAction() {
		// header('Content-Type: text/html; charset=utf-8');

		// 实例化相应的模型类对象，调用某个方法，实现固定功能
		//通过工厂获得对象
		$m_match = Factory::M('MatchModel');
		$match_list = $m_match->getList();

		// 载入负责显示的html文件
		require CURRENT_VIEW_PATH . 'match_list_v.html';
	}

	/**
	 * 比赛删除
	 */
	public function removeAction() {
		// header('Content-Type: text/html; charset=utf-8');

		echo '比赛控制器的删除动作执行了';
	}
}