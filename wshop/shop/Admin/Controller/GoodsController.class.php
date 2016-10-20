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

