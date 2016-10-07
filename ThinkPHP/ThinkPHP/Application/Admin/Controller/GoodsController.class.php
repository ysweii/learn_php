<?php
/**
 * Created by PhpStorm.
 * User: weics
 * Date: 2016/10/4
 * Time: 14:52
 */
namespace Admin\Controller;
use Components\EmailTool;
use Model\GoodsModel;
use Think\Controller;
use Think\Image;
use Think\Page;
use Think\Think;
use Think\Upload;

class GoodsController extends Controller{

    public function showlist(){
        $model = M('goods');
        $recordcount = $model->count();//获取总的记录数
        $page = new Page($recordcount,5);


        $page->lastSuffix = false;//最后一页是否显示总页数
        $page->rollPage=4;  //分页栏每页显示的页数
        $page->setConfig('prev','【上一页】');
        $page->setConfig('next','【下一页】');
        $page->setConfig('first','【首页】');
        $page->setConfig('last','【末页】');

        $page->setConfig('theme','共 %TOTAL_ROW% 条记录,当前是 %NOW_PAGE%/%TOTAL_PAGE% %FIRST% %UP_PAGE%  %DOWN_PAGE% %END%');

        $startno = $page->firstRow;//起始的行数
        $pagesize = $page->listRows;//页面的大小
        $list = $model->limit("$startno,$pagesize")
                        ->select();
        $pagestr = $page->show();
        $this->assign('pagestr',$pagestr);
        $this->assign('list',$list);
        $this->display();

    }


    public function add(){
//        $goods = M('goods');
        //方法一
//        if(IS_POST){
//            $date['goods_name'] = $_POST['goods_name'];
//            $date['goods_category_id'] = $_POST['goods_category_id'];
//            $date['goods_price'] = $_POST['goods_price'];
//            $date['goods_introduce'] = $_POST['goods_introduce'];
//
//            $msg = '添加失败';
//            if ($goods->add($date)){
//                $msg = '添加失败';
//            }
//            $this->redirect('showlist',array(),3,$msg);

//        }

        //方法二
        $goods=M('goods');
        if(IS_POST){
            if($data=$goods->create()){
                if($_FILES['goods_image']['error']==0){
                    //文件上传部分
                    $config=array(
                        'rootPath'  =>  './Application/Admin/Public/uploads/',
                    );
                    $upload=new \Think\Upload($config);
                    $info=$upload->uploadOne($_FILES['goods_image']);
                    //var_dump($info);
//                    var_dump($info);
//                    echo __CONTROLLER__;
                    $data['goods_big_img']=$info['savepath'].$info['savename'];

                    $img = new Image();

                    $big_img = $upload->rootPath.$data['goods_big_img'];
                    $img->open($big_img);

                    $img->thumb(200,300,2);
                    $small_img = $upload->rootPath.$info['savename'].'small_'.$info['savename'];
                    $img->save($small_img);
                    $data['goods_small_img'] = $info['savepath'].'small_'.$info['savename'];

                    if($goods->add($data)){
                        $this->success('添加成功',U('showlist'),3);
                    }else{
                        $this->error('添加失败');
                    }

                }else{
                    var_dump($upload->getError());  //显示上传错误
                    exit();
                }
            }
        }


//        $goods = M('goods');
//        if(IS_POST){
//            if($date = $goods->create()){
//                if($_FILES['goods_image']['error'] == 0){
//                    //文件上传部分
//                    $config = array(
//                        'rootPath'  =>  './Application/public/uploads/',
//                    );
//                    $upload = new \Think\Upload($config);
//
//                    $info = $upload->uploadOne($_FILES['goods_image']);
//                    var_dump($info);
//                }
//
//
////                if ($goods->add($date)){
////                    $this->success('添加成功','showlist',3);
////                } else {
////                    $this->error('添加失败');
////                }
//            }
//        }

//        if(IS_POST){
//            if (M('goods')->add(I('post.'))){
//                $this->success('添加成功','showlist',3);
//            } else {
//                $this->error('添加失败');
//            }
//        }


        $category = M('category')->select();
        $this->assign('category',$category);
        $this->display();
    }



    public function update($goods_id){
        if (IS_POST){
            $goods = M('goods');
            $data = $goods->create();
            $data['goods_create_time'] = time();
            if ($goods->save($data)){
                $this->success('修改成功',U('showlist'),3);
            } else {
                $this->error('修改失败');
            }
            exit();
        }

        $category = M('category')->select();
        $data = M('goods')->find($goods_id);
        echo U('showlist');
//        echo "<pre>";
//        var_dump($data);
        $this->assign('category',$category);
        $this->assign('data',$data);
        $this->display();


    }


    public function del($goods_id){
        if (M('goods')->delete($goods_id)){
            $this->success('删除成功',U('showlist'),3);
        } else {
            $this->error('失败',U('showlist'),3);
        }
    }


    public function send(){
        $obj = new EmailTool();
        $obj->send();
    }











    public function test7(){
//        $list = M()->query('select * from sw_goods');
//        echo "<pre>";
//        var_dump($list);

        echo M()->execute('delete from sw_goods where goods_id = 130');
    }




    public function test6(){
//        echo M('goods')->delete(139);
//        echo M('goods')->delete('137,138');
//        echo M('goods')->where("goods_name='apple'")
//                        ->delete();
        $model = M('goods');
        $model->goods_id= 128;
        echo $model->delete();
    }





    public function test5(){
//        $data = array(
//            'goods_name' => '手机的22222',
//            'goods_price' => '233',
//            'goods_id'  => 137
//        );
//        echo M('goods')->save($data);
        $goods = M('goods');
        $goods->goods_name = '电视333';
        $goods->goods_price = 1111;
        $goods->goods_id = 13;
        echo $goods->save();


    }




    public function test4(){
        $data = array(
            'goods_name' => '手机',
            'goods_price' => 2300
        );
        echo M('goods')->add($data);

//        $goods = M('goods');
//        $goods->goods_name = '电视';
//        $goods->goods_price =1000;
//        echo $goods->add();
    }




    public function test3(){
        $goods = M('goods');
        echo $goods->count()."<br>";
        echo $goods->max('goods_price').'<br>';
        echo $goods->min('goods_price').'<br>';
        echo $goods->avg('goods_price').'<br>';
        echo $goods->sum('goods_price').'<br>';
    }




    public function test2(){
        $data = M('goods')->getBygoods_brand_id(0);
        echo "<pre>";
        var_dump($data);
    }










    public function test(){
//        $list = M('goods')->select();
//        $this->assign('list',$list);
//        $this->display();

////        $goods = M('goods')->find();
////        echo "<pre>";
////        var_dump($goods);
//        $list = M('goods')->select(2);
//        echo '<pre>';
//        var_dump($list);

//        $list = M('goods')->select("2,3,4,5,6");
//        echo "<pre>";
//        var_dump($list);

//        $list = M('goods')->where("goods_name like '%诺基亚%' and goods_price>=1000")
//                            ->select();

//        $list = M('goods')->limit(2,5)
//                            ->select();

//

//        $list = M('goods')->order('goods_price desc')
//                            ->select();
//        $list = M('goods')->field('goods_name,goods_price')
//                            ->select();

//        $list = M('goods')->having('goods_price >= 2000')
//                            ->select();

        $list = M('goods')->group('goods_brand_id')
            ->field('goods_brand_id, max(goods_price) m')
            ->having('m>2000')
            ->select();



        echo '<pre>';
        var_dump($list);
    }
}