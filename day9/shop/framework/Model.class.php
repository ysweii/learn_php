<?php

//基础模型类
class Model {
	//存储DAO对象的属性，可以在子类方法中访问，使用对象
	protected $_dao;

	//初始化DAO
	protected function _initDAO(){
		//初始化MySQLDB
		$config = array(
					'host' => '127.0.0.1',
					'port' => '3306',
					'username' => 'root',
					'password' => '123',
					'charset' => 'utf8',
					'dbname' => 'match'
				);

		require_once './framework/MySQLDB.class.php';
		$this->_dao = MySQLDB::getInstance($config);
	}

	public function __construct() {
		$this->_initDAO();
	}

}