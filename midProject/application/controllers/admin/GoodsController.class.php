<?php
//商品控制器
class GoodsController extends BaseController{
    //载入添加的商品界面
    public function addAction(){
        //获取商品的分类信息
        $categoryModel = new CategoryModel("category");
        $cats = $categoryModel->getCats();
        //获取商品的品牌信息
        $brandModel = new BrandModel("brand");
        $brands = $brandModel->getBrands();

        //获取商品的类型信息
        $typeModel = new TypeModel("goods_type");
        $types = $typeModel->getTypes();

        //载入视图
        include CUR_VIEW_PATH . "goods_add.html";
    }


    //商品入库
    public function insertAction(){
        //1.   收集表单
        $data['goods_name'] = trim($_POST['goods_name']);
        $data['goods_sn'] = trim($_POST['goods_sn']);
        $data['brand_id'] = $_POST['brand_id'];
        $data['cat_id'] = $_POST['cat_id'];
        $data['type_id'] = $_POST['type_id'];
        $data['shop_price'] = trim($_POST['shop_price']);
        $data['market_price'] = trim($_POST['market_price']);
        $data['promote_start_time'] = strtotime($_POST['promote_start_time']);
        $data['promote_end_time'] = strtotime($_POST['promote_end_time']);
        $data['goods_desc'] = trim($_POST['goods_desc']);
        $data['goods_number'] = trim($_POST['goods_number']);
        //$data['add_time'] = time();
        // $data['is_best'] = isset($_POST['is_best']) ?　$_POST['is_best'] : 0;
        // $data['is_new'] = isset($_POST['is_new']) ?　$_POST['is_new'] :　0;
        // $data['is_hot'] = isset($_POST['is_hot']) ?　$_POST['is_hot'] :　0;
        // $data['is_onsale'] = isset($_POST['is_onsale']) ?　$_POST['is_onsale'] :　0;

        $data['add_time'] = time();
		$data['is_best'] = isset($_POST['is_best']) ? $_POST['is_best'] : 0;
		$data['is_new'] = isset($_POST['is_new']) ? $_POST['is_new'] : 0;
		$data['is_hot'] = isset($_POST['is_hot']) ? $_POST['is_hot'] : 0;
		$data['is_onsale'] = isset($_POST['is_onsale']) ? $_POST['is_onsale'] : 0;


        //处理图片的上传
        $this->library("Upload");
        $upload = new Upload();
        if ($filename = $upload->up($_FILES['goods_img'])) {
            //成功
            $data['goods_img'] = $filename;//相对于upload文件的路径保存到表中
        } else {
            //失败
            $this->jump('index.php?p=admin&c=goods&a=add',$upload->error(),3);
        }

        //2  验证和处理
        $this->helper("input");
        $data = deepslashes($data);
        $data = deepspecialchars($data);

        // 3 调用模型来完成入库  并且给出提示
        $goodsModel = new GoodsModel("goods");
        if ($goods_id = $goodsModel->insert($data)){
            //成功   同时需要完成扩展属性的入库
            //收集表单
            $attr_ids = $_POST['attr_id_list'];
            $attr_values = $_POST['attr_value_list'];
            $attr_prices = $_POST['attr_price_list'];

            //需要批量插入
            foreach ($attrs_id as $k => $v) {
                //构造关联数组
                $list['goods_id'] = $goods_id;
                $list['attr_ids'] = $v;
                $list['attr_value'] = $attr_values[$k];
                $list['attr_price'] = $attr_prices[$k];

                //调用模型来完成入库
                $emptyModel = new Model("goods_attr");
                $emptyModel->insert($list);
            }

            $this->jump("index.php?p=admin&c=goods&a=add","添加商品成功",2);
        } else {
            //失败
            $this->jump("index.php?p=admin&c=goods&a=add","添加商品失败",3);
        }
    }
}
