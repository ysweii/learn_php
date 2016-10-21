<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller{
    public function showlist(){
        
        $goods = D('goods');
       
        $total = $goods->count();
        $per = 7;
        $page = new \Tools\Page($total,$per);
        $sql = "select * from sw_goods order by goods_id desc ".$page->limit;
        $info = $goods->query($sql);
//        echo "<pre>";
//        var_dump($info);
        $page_list = $page->fpage();
        //var_dump($page_list);
        $this->assign('page_list',$page_list);
        $this->assign('info',$info);
        $this->display();
    }
    
    
    public function add(){
        $goods = M('goods');
        $category = M('category');
        $cats = $category->select();
        //var_dump($cats);
        
        if(!empty($_POST)){
            
            //实现附件图片的的上传
            if($_FILES['goods_big_img']['error'] != 4){
                $cfg = array(
                    'rootPath'  =>  './Admin/Public/uploads/',
                );
                
                $up = new \Think\Upload($cfg);
                $pic_result = $up->uploadOne($_FILES['goods_big_img']);
                $pic_name = $pic_result['savepath'].$pic_result['savename'];
                $_POST['goods_big_img'] = $pic_name;            
                //生成缩略图
                $img = new \Think\Image();
                $img->open('./Admin/Public/uploads/'.$pic_name);
                $small_picname = $pic_result['savepath'].'small_'.$pic_result['savename'];
                $img->thumb(120, 120,6)->save('./Admin/Public/uploads/'.$small_picname);
                $_POST['goods_small_img'] = $small_picname;
            }
            $info = $goods->create();
            $result = $goods->add($info);
            if($result){
                //添加成功  有返回的结果
                $this->redirect('showlist',array(),2,'添加商品成功');
            }
        }
        
        
        $this->assign('cats',$cats);
        $this->display();
    }
    
    public function update($goods_id){
//        var_dump($goods_id);
        $goods = M('goods');
        $sql = "select * from sw_goods where goods_id=".$goods_id;
//        var_dump($sql);
        $info = $goods->query($sql);
//        var_dump($info);
        $this->assign('info',$info);
//        echo "<pre>";
//        var_dump($info);
//        
//        var_dump($info[0]['goods_name']);
        $this->display();
    }
    
    
    public function delete(){
        
    }
    
    
}

