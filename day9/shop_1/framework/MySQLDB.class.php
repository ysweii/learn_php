<?php



class MySQLDB{
	public $host;
	public $port;
	public $username;
	public $password;
	public $charset;
	public $dbname;

	//链接资源
	private static $link;

	private $resource;

	public static function getInstance($config){
		if (!isset(self::$link)) {
			self::$link = new self($config);
		}
		return self::$link;
	}

	private function __construct($config){
		//初始化数据
		$this->host = isset($config['host']) ? $config['host'] : 'localhost';
		$this->port = isset($config['port']) ? $config['port'] : '3306';
		$this->username = isset($config['username']) ? $config['username'] : 'root';
		$this->password = isset($config['password']) ? $config['password'] : '';
		$this->charset = isset($config['charset']) ? $config['charset'] : 'utf8';
		$this->dbname = isset($config['dbname']) ? $config['dbname'] : '';


    	//链接数据库
    	$this->connect();
    	//设定链接的编码
    	$this->setCharset($this->charset);
    	//选定链接的数据库
    	$this->selectDb($this->dbname);
	}	


	//禁止克隆
	private function __clone(){}
	//这里进行链接
	public function connect(){
		$this->resource = mysql_connect("$this->host:$this->port","$this->username","$this->password") or die("链接数据库失败！");
	}	

	public function setCharset($charset){
		mysql_set_charset($charset,$this->resource);
	}	

	public function selectDb($dbname){
		mysql_select_db($dbname,$this->resource);
	}	


	/**
	 * 功能：执行最基本的SQL语句
	 * 返回：如果失败直接结束，如果成功，返回执行结果
	 */
	public function query($sql){
		if (!$result = mysql_query($sql,$this->resource)) {
			echo("<br/> 执行失败。");
			echo "<br/> 失败的SQL语句：".$sql;
			echo "<br/> 出错的信息为：".mysql_error();
			echo "<br/> 错误的代号为：".mysql_errno();
			die();
		}
		return $result;
	}

	/**
	 * 功能：执行select语句，返回2维数组
	 * 参数：$sql 字符类型 
	 */
	public function getAll($sql){
		$result = $this->query($sql);
		$arr = array();
		while ( $rec = mysql_fetch_assoc($result)) {
			$arr[] = $rec;
		}
		return $arr;
	}

	//返回一行数据
	public function getRow($sql){
		$result = $this->query($sql);
		//$rec = array();
		if( $rec2 = mysql_fetch_assoc( $result )){//返回下标为字段名的数组
			//如果fetch出来有数据（也就是取得了一行数据），结果自然是数组
			return $rec2;
		}
		return false;
	}

	//返回一个数据   select语句的第一行第一列
	//比如常见的   select count（*）as c from XXX where ...
	public function getOne($sql){
		$result = $this->query($sql);
		$rec = mysql_fetch_row($result);
		if ($result === false) {
			return false;
		}
		return $rec[0];
	}

}