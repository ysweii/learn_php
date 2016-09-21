<?php
class Model{
	protected $_dao;

	protected function _initDAO(){
		$config = array('host' => '127.0.0.1',
						'port' => '3306',
						'username' => 'root',
						'password' => '123',
						'charset' => 'utf8',
						'dbname' => 'match'
						);

		require_once './MySQLDB.class.php';
		$this->_dao = MySQLDB::getInstance($config);
	}

	//构造方法
	public function __construct(){
		$this->_initDAO();
	}
}