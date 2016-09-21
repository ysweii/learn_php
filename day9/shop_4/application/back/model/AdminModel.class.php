<?php
//admin 的模型
class AdminModel extends Model{
	//验证管理员是否合法
	public function check($admin_name,$admin_pass){
		$sql = "SELECT * FROM `p_admin` WHERE admin_name = '$admin_name' and admin_pass = md5('$admin_pass')";
		$row = $this->_dao->getRow($sql);
		return (bool)$row;
	}
}