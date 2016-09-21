<?php
class AttributeController extends BaseController{
    //显示商品属性
    public function indexAction(){

        $attrModel = new AttributeModel("attribute");

        $typeModel = new TypeModel("goods_type");
        $types = $typeModel->getTypes();
        //接收type_id
        $type_id = $_GET['type_id'] + 0;
        $current = isset($_GET['page']) ? $_GET['page'] : 1;
        $pagesize = 2;

        $where = "type_id = $type_id";
        $total = $attrModel->total($where);

        $offset = ($current - 1) * $pagesize;

        $attrs = $attrModel->getPageAttrs($type_id,$offset,$pagesize);

        $this->library("Page");
        $page = new Page($total,$pagesize,$current,'index.php',array('p'=>'admin','c'=>'attribute','a'=>'index','type_id'=>$type_id));
        $pageinfo = $page->showPage();

        include CUR_VIEW_PATH . "attribute_list.html";
    }




    //展示添加界面
    public function addAction(){
        //获取所有的商品类型
        $typeModel = new TypeModel("goods_type");
        $types = $typeModel->getTypes();
        //载入视图
        include CUR_VIEW_PATH . "attribute_add.html";
    }

    //插入数据库中
    public function insertAction(){
        //1  接收表单数据
        $data['attr_name'] = trim($_POST['attr_name']);
        $data['type_id']  = $_POST['type_id'];
        $data['attr_type'] = $_POST['attr_type'];
        $data['attr_input_type'] = $_POST['attr_input_type'];

        $data['attr_value'] = isset($_POST['attr_value']) ? $_POST['attr_value'] : "";

        // 2   验证和处理数据
        $this->helper("input");
        $data = deepspecialchars($data);
        $data = deepslashes($data);

        // 3  调用模型完成入库
        $attrModel = new AttributeModel("attribute");
        if ($attrModel->insert($data)) {
            $this->jump("index.php?p=admin&c=attribute&a=index","添加属性成功",2);
        } else {
            $this->jump("index.php?p=admin&c=attribute&a=add","添加属性失败",3);
        }
    }

    public function getAttrsAction(){
        //获取type_id
        $type_id = $_GET['type_id'] + 0;
        //调用模型来查找属性并构造表单返回
        $attrModel = new AttributeModel("attribute");
        $attrs = $attrModel->getAttrsForm($type_id);
        echo <<<STR
<script type="text/javascript">
    window.parent.document.getElementById("tbody-goodsAttr").innerHTML = "$attrs";
</script>
STR;
    }


}
