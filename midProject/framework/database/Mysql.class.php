<?php
class Mysql{
    protected $conn = false;
    protected $sql;

    //构造函数
    public function __construct($config = array()){
        $host       = isset($config['host'])        ? $config['host']       : 'localhost';
        $user       = isset($config['user'])        ? $config['user']       : 'root';
        $password   = isset($config['password'])    ? $config['password']   : '';
        $dbname     = isset($config['dbname'])      ? $config['dbname']     : '';
        $port       = isset($config['port'])        ? $config['port']       : '3306';
        $charset    = isset($config['charset'])     ? $config['charset']    : 'utf8';

        $this->conn = mysql_connect("$host:$port",$user,$password) or die('数据库连接失败');
        mysql_select_db($dbname) or die('数据库选择错误');
        $this->setChar($charset);
    }

    //设置字符集
    private function setChar($charset){
        $sql = 'set names '.$charset;
        $this->query($sql);
    }

    //执行SQL语句
    public function query($sql){
        $temp = "[" . date('Y-m-d H:i:s') . "]" .$sql . PHP_EOL;
        file_put_contents("log.txt",$temp,FILE_APPEND);

        $this->sql = $sql;
        $result = mysql_query($this->sql,$this->conn);

        if (! $result) {
            die($this->errno().':'.$this->error().'<br/> 出错的语句为：'.$this->sql.'<br/>');
        }
        return $result;
    }


    //获取第一条记录的第一个字段
    public function getOne($sql){
        $result = $this->query($sql);
        $row = mysql_fetch_row($result);
        if ($row) {
            return $row[0];
        } else {
            return false;
        }
    }


    //获取一条记录
    public function getRow($sql){
        if ($result = $this->query($sql)) {
            $row = mysql_fetch_assoc($result);
            return $row;
        } else {
            return false;
        }
    }

    public function getAll($sql){
        $result = $this->query($sql);
        $list = array();
        while($row = mysql_fetch_assoc($result)){
            $list[] = $row;
        }
        return $list;
    }


    //获取某一列的值
    public function getCol($sql){
        $result = $this->query($sql);
        $list = array();
        while ($row = mysql_fetch_row($result)) {
            $list[] = $row[0];
        }

        return $list;
    }


    //获取上一步insert操作产生的id
    public function getInsertId(){
        return mysql_insert_id($this->conn);
    }

    //获取错误号
    public function errno(){
        return mysql_errno($this->conn);
    }

    //获取错误号
    public function error(){
        return mysql_error($this->conn);
    }





















}
