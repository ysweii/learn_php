<?php
//属性模型
class AttributeModel extends Model{
    //获取所有的属性
    public function getAttrs($type_id){
        $sql = "SELECT a.*,b.type_name FROM cz_attribute as a inner join  cz_goods_type as b  on a.type_id = b.type_id where a.type_id = $type_id";
        return $this->db->getAll($sql);
    }


    public function getPageAttrs($type_id,$offset,$pagesize){
        if ($type_id  == 0) {
            $sql = "select a.*,b.type_name FROM cz_attribute as a
                    inner join cz_goods_type as b on a.type_id = b.type_id
                    limit $offset,$pagesize";
        } else {
            $sql = "select a.*,b.type_name FROM cz_attribute as a
                    inner join cz_goods_type as b on a.type_id = b.type_id
                    where a.type_id = $type_id
                    limit $offset,$pagesize";
        }
        return $this->db->getAll($sql);

    }

    public function getAttrsForm($type_id){

        //获取类型下的所有的属性
        $sql = "select * from {$this->table} where type_id = $type_id";
        $attrs = $this->db->getAll($sql);
        $res = "<table width = '100%' id = 'attrTable'>";
        $res.= "<tbody>";
        foreach ($attrs as $attr) {
            $res .= "<tr>";
            $res .= "<td>";
            $res .= "<td class = 'label'>{$attr['attr_name']}</td>";
            $res .= "<td>";
            $res .= "<input type='hidden' name='attr_id_list[]' value='".$attr['attr_id']."'>";
            switch ($attr['attr_input_type']) {
                case 0:
                    $res .= "<input name ='attr_value_list[]' type='text' size='40'>";
                    break;
                case 1: #下拉列表
					$res .= "<select name='attr_value_list[]'>";
					$res .= "<option value=''>请选择...</option>";
					$opts = explode(PHP_EOL, $attr['attr_value']);
					foreach ($opts as $opt){
						$res .= "<option value='$opt'>$opt</option>";
					}
					$res .= "</select>";
					break;
				case 2: #多行文本
					$res .= "<textarea name='attr_value_list[]'></textarea>";
					break;
            }
            $res .= "<input type='hidden' name='attr_price_list[]' value='0'>";
            $res .= "</td>";
            $res .= "</tr>";
        }
        $res .= "</tbody>";
		$res .= "</table>";
		return $res;

    }

}
