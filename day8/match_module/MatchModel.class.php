<?php

require_once './Model.class.php';
class MatchModel extends Model {
	public function getList(){
		$sql = "select t1.t_name as t1_name, m.t1_score, m.t2_score, t2.t_name as t2_name, m.m_time from `match` as m left join `team` as t1 ON m.t1_id = t1.t_id left join `team` as t2 ON m.t2_id = t2.t_id;";
		return $this->_dao->getAll($sql);
	}	

	//删除某场比赛
	public function removeMatch($m_id){
		$sql = "delete frome `match` where m_id = $m_id";
		return $this->_dao->query($sql);
	}

	public function rmTeam($t_id){
		$sql = "delete from `team` where t_id = $t_id";
		return $this->_dao->query($sql);
	}
}