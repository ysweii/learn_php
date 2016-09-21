<?php
//商品类型控制器
class TypeController extends BaseController{

    //显示商品的分类
    public function indexAction(){
        //获取所有商品分类的数据
        $typeModel = new TypeModel("goods_type");
        //$types = $typeModel->getTypes();
        //展示到视图
        //获取当前的分页，通过url的参数
        $current = isset($_GET['page']) ? $_GET['page'] : 1;
        //获取每页显示的页数
        $pagesize = 2;
        $offset = ($current - 1) * $pagesize;
        $types = $typeModel->getPageTypes($offset,$pagesize);
        //使用分页类来获取分页的信息
        $where = "";
        $total = $typeModel->total($where);
        $this->library("Page");
        $page = new Page($total,$pagesize,$current,'index.php',array('p'=>'admin','c'=>'type','a'=>'index'));
        $pageinfo = $page->showPage();
        include CUR_VIEW_PATH . "goods_type_list.html";
    }



    //展示添加的界面
    public function addAction(){
        include CUR_VIEW_PATH . "goods_type_add.html";
    }


    //添加类的动作
    public function insertAction(){
        //1.接收表单的数据
        $data['type_name'] = trim($_POST['type_name']);
        //2 处理表单数据
        $this->helper('input');
        $data = deepspecialchars($data);
        $data = deepslashes($data);
        //3 调用模型进行入库的操作，并且给出提示
        $typeModel = new TypeModel("goods_type");
        if ($typeModel->insert($data)) {
            //插入成功
            $this->jump('index.php?p=admin&c=type&a=index',"添加商品分类成功",2);
        } else {
            //插入失败
            $this->jump('index.php?p=admin&c=type&a=add',"添加商品分类失败",3);
        }
    }
}
