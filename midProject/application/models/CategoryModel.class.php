<?php
//商品分类模型
class CategoryModel extends Model{
    //获取所有的分类信息
    public function getCats(){
        $sql = "SELECT * FROM {$this->table}";
        $cats = $this->db->getAll($sql);
        return $this->tree($cats);
    }

    //定义一个方法  用于形成树状结构
    /**
	 *@param $arr array 给定数组
	 *@param $pid int 指定从哪个节点开始找
	 *@return array 构造好的数组
	*/
    public function tree($arr,$pid=0,$level=0){
        static $tree = array();
        foreach ($arr as $v) {
            if ($v['parent_id'] == $pid) {
                $v['level'] = $level;
                $tree[] = $v;
                $this->tree($arr,$v['cat_id'],$level+1);
            }
        }
        return $tree;
    }

    public function getSubId($pid){
        $sql = "SELECT * FROM {$this->table}";
        $cats = $this->db->getAll($sql);
        $cats = $this->tree($cats,$pid);
        $list = array();
        foreach ($cats as $cat) {
            $list[] = $cat['cat_id'];
        }

        return $list;
    }

    public function frontCats(){
        $sql = "select * from {$this->table}";
        $cats = $this->db->getAll($sql);
        return $this->childList($cats);
    }


    public function childList($arr,$pid=0){
        $list = array();
        foreach( $arr as $v){
            if ($v['parent_id'] == $pid) {
                //说明找到了该节点  并已该节点来查找其后代的节点
                $child = $this->childList($arr,$v['cat_id']);

                //将结果存储起来
                $v['child'] = $child;
                $list[] = $v;
            }
        }

        return $list;
    }





}
