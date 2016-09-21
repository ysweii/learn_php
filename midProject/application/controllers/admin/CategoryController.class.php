<?php
//商品分类控制器
class CategoryController extends BaseController {
    //显示商品分类
    public function indexAction(){
        $categoryModel = new CategoryModel("category");
        $cats = $categoryModel->getCats();
        //载入显示的页面
        //var_dump($cats);
        include CUR_VIEW_PATH . "cat_list.html";
    }

    //展示添加分类的动作
    public function addAction(){
        $categoryModel = new CategoryModel("category");
        $cats = $categoryModel->getCats();
        include CUR_VIEW_PATH . "cat_add.html";
    }

    //添加分类动作
    public function insertAction(){
        //1   收集表单数据
        $data['cat_name'] = trim($_POST['cat_name']);
        $data['parent_id'] = $_POST['parent_id'];
        $data['unit'] = trim($_POST['unit']);
        $data['sort_order'] = trim($_POST['sort_order']);
        $data['is_show'] = $_POST['is_show'];
        $data['cat_desc'] = trim($_POST['cat_desc']);
        // 2   验证及处理
        //载入辅助函数
        $this->helper('input');
        //完成转义
        $data = deepspecialchars($data);

        //判断分类名称不能为空
        if ($data['cat_name'] === ""){
            $this->jump("index.php?p=admin&c=category&a=add","分类名称不能为空",3);
        }
        // 3   调用模型  完成入库  并给出提示
        $categoryModel = new CategoryModel("category");
        if ($categoryModel->insert($data)) {
            $this->jump("index.php?p=admin&c=category&a=index","添加分类成功",2);
        } else {
            $this->jump("index.php?p=admin&c=category&a=add","添加分类失败",3);
        }
    }


    public function editAction(){
        // 1  获取当前分类的信息
        $cat_id = $_GET['cat_id'] + 0;
        $categoryModel = new CategoryModel('category');
        $cat = $categoryModel->selectByPk($cat_id);
        //获取所有的分类的信息
        $cats = $categoryModel->getCats();
        // echo "<pre>";
        // var_dump($cats);
        // echo "</pre>";
        // 2  载入编辑的表单
        include CUR_VIEW_PATH . "cat_edit.html";
    }

    public function updateAction(){
        // 1   手机表单数据
        $data['cat_name'] = trim($_POST['cat_name']);
        $data['parent_id'] = $_POST['parent_id'];
        $data['unit'] = trim($_POST['unit']);
        $data['sort_order'] = trim($_POST['sort_order']);
        $data['is_show'] = $_POST['is_show'];
        $data['cat_desc'] = trim($_POST['cat_desc']);
        // 2  验证机处理
        $this->helper('input');
        $data = deepspecialchars($data);

        if ($data['cat_name'] === ""){
            $this->jump('index.php?p=admin&c=category&a=add',"分类名不能为空",3);
        }

        //不能将当前的节点及其子节点座位上级节点
        //获取当前节点的所有子孙节点
        $categoryModel = new CategoryModel('category');
        $ids = $categoryModel->getSubId($data['cat_id']);
        //将当前的节点合进去
        $ids[] = $data['cat_id'];
        if(in_array($data['parent_id'],$ids)){
            $this->jump('index.php?p=admin&c=category&a=edit&cat_id='.$data['cat_id'],"不能将当前节点及其子节点当作上级节点",3);
        }

        // 3   调用模型完成更新操作
        if ($categoryModel->update($data)){
            $this->jump('index.php?p=admin&c=category&a=index',"更新成功",2);
        } else {
            $this->jump('index.php?p=admin&c=category&a=edit&cat_id='.$data['cat_id'],"更新失败",3);
        }
    }

    //删除商品分类
    public function deleteAction(){
        //1 获取cat_id   作为条件
        $cat_id = $_GET['cat_id'] + 0;
        // 2   做相应的判断
        $categoryModel = new CategoryModel("category");
        $cats = $categoryModel->getSubId($cat_id);
        if (!empty($cats)) {
            $this->jump('index.php?p=admin&c=category&a=index',"当前的分类不是叶子节点，无法删除",5);
        }

        //3  调用模型  完成删除  并给出提示
        if ($categoryModel->delete($cat_id)){
            $this->jump('index.php?p=admin&c=category&a=index',"删除商品分类成功",2);
        } else {
            $this->jump('index.php?p=admin&c=category&a=index',"删除商品分类失败",3);
        }
    }

















}
