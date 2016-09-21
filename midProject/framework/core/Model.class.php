<?php
//基础模型类
class Model{
  protected $db;
  protected $table;
  protected $fields = array();

  public function __construct($table){
    $dbconfig['host'] = $GLOBALS['config']['host'];
    $dbconfig['user'] = $GLOBALS['config']['user'];
    $dbconfig['password'] = $GLOBALS['config']['password'];
    $dbconfig['port'] = $GLOBALS['config']['port'];
    $dbconfig['dbname'] = $GLOBALS['config']['dbname'];
    $dbconfig['charset'] = $GLOBALS['config']['charset'];


    $this->db = new Mysql($dbconfig);
    $this->table = $GLOBALS['config']['prefix'] . $table;

    $this->getFields();
  }

  private function getFields(){
    $sql = "DESC " . $this->table;
    $result = $this->db->getAll($sql);

    foreach($result as $v){
      $this->fields[] = $v['Field'];
      if ($v['Key'] == 'PRI') {
        #是主键
        $pk = $v['Field'];
      }
    }

    if (isset($pk)) {
      $this->fields['pk'] = $pk;
    }
  }

  //自动插入记录
    public function insert($list){
        $field_list = '';
        $value_list = '';
        foreach ($list as $k => $v){
          if (in_array($k,$this->fields)) {
            $field_list .= "`".$k."`" . ",";
            $value_list .= "'".$v."'" . ",";
          }
        }

        #去除最右边的逗号
        $field_list = rtrim($field_list,',');
        $value_list = rtrim($value_list,',');

        #构造sql语句
        $sql = "INSERT INTO `{$this->table}` ({$field_list}) VALUES ($value_list)";

        if ($this->db->query($sql)) {
          #插入成功  返回最后插入的id
          return $this->db->getInsertId();
        } else {
          #插入失败  返回false
          return false;
        }
    }


  //更新操作
    public function update($list){
        $uplist = '';
        $where = 0;
        foreach($list as $k => $v){
            if (in_array($k,$this->fields)){
                if ($k == $this->fields['pk']) {
              #是主键
              $where = "`$k`=$v";
                } else {
                    #不是主键
                    $uplist .= "`$k`='$v'".",";
                }
            }
        }

        #去除右边的逗号
        $uplist = rtrim($uplist,',');

        #构造SQL语句
        $sql = "UPDATE `{$this->table}` SET {$uplist} WHERE {$where}";

        if ($this->db->query($sql)) {
            if ($rows = mysql_affected_rows()) {
                return $rows;
            } else {
                return false;
            }
        } else {
            #更新失败
            return false;
        }
    }

    public function delete($pk){
        $where = 0;
        #判断pk是数组还是单值
        if (is_array($pk)) {
            #数组
            $where = "`{$this->fields['pk']}` in (" . implode(',',$pk).")";
        } else {
            #单值
            $where = "`{$this->fields['pk']}` = $pk";
        }

        #构造SQL语句
        $sql = "DELETE FROM `{$this->table}` WHERE $where";

        if ($this->db->query($sql)) {
            #执行成功
            if ($rows = mysql_affected_rows()) {
                return $rows;
            } else {
                #没有收影响的记录
                return false;
            }
        } else {
            #删除失败
            return false;
        }
    }

    //获取主键信息
    public function selectByPk($pk){
        $sql = "select * from `{$this->table}` where `{$this->fields['pk']}`=$pk";
        return $this->db->getRow($sql);
    }

    //获取总的记录数
    public function total($where){
        if (empty($where)) {
            $sql = "SELECT COUNT(*) FROM {$this->table}";
        } else {
            if(substr(str_replace(" ","",$where),-2) == "=0"){
                $sql = "SELECT COUNT(*) FROM {$this->table}";
            } else {
                $sql = "SELECT COUNT(*) FROM {$this->table} where $where";
            }
        }

        return $this->db->getOne($sql);
    }

    //分页获取信息
    public function pageRows($offset,$limit,$where = ''){
        if (empty($where)) {
            $sql = "SELECT * FROM {$this->table} limit $offset,$limit";
        } else {
            $sql = "SELECT * FROM {$this->table} where $where limit $offset,$limit";
        }

        return $this->db->getAll($sql);
    }




















}
