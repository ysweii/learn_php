<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;
use Think\Model;
class UserModel extends Model{
    public function checkNamePwd($nm,$pw){
        
        $info = $this->where("mg_name='$nm'")->find();
        if($info !== null){
            if($info['mg_pwd'] === $pw){
                return $info;
            }
        }
        return false;
            
    }
}

