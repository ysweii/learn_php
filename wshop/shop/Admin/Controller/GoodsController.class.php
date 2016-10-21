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
        $sql = "select * from sw_goods";
        $info = $goods->query($sql);
//        echo "<pre>";
//        var_dump($info);
        $this->assign('info',$info);
        $this->display();
    }
    
    
    public function add(){
        $goods = M('goods');
        $category = M('category');
        $cats = $category->select();
        //var_dump($cats);
        
        if(!empty($_POST)){
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

