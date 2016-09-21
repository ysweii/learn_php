<?php


//商品分类的模型


class TypeModel extends Model{
    //获取所有的商品分类信息
    public function getTypes(){
        $sql = "SELECT * FROM {$this->table} ORDER BY type_id";
        return $this->db->getAll($sql);
    }


    public function getPageTypes($offset,$pagesize){
        $sql = "SELECT * FROM {$this->table} ORDER BY type_id LIMIT $offset,$pagesize";
        return $this->db->getAll($sql);
    }
}
