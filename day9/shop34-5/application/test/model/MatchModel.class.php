<?php


/**
 * match表的操作模型类
 */
class MatchModel extends Model {

	/**
	 * 获得所有的比赛列表
	 */
	public function getList() {
		//获得比赛列表数据
		$sql = "select t1.t_name as t1_name, m.t1_score, m.t2_score, t2.t_name as t2_name, m.m_time from `match` as m left join `team` as t1 ON m.t1_id = t1.t_id  left join `team` as t2 ON m.t2_id=t2.t_id;";
		return $this->_dao->getAll($sql);
	}

	/**
	 * 删除某场比赛
	 */
	public function removeMatch($m_id) {
		$sql = "delete from `match` where m_id=$m_id";
		return $this->_dao->query($sql);
	}

	public function rmTeam($t_id) {
		return $this->_dao->query("delete from `team` where t_id = $t_id");
	}
}