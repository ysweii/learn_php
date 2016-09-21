<?php
//品牌的模型
class BrandModel extends Model{
    //获取所有的品牌信息
    public function getBrands(){
        $sql = "SELECT * FROM {$this->table}";
        return $this->db->getAll($sql);
    }

    //分页获取品牌的信息
    public function getPageBrands($offset,$limit){
        $sql = "SELECT * FROM {$this->table} limit $offset,$limit";
        return $this->db->getAll($sql);
    }
}
