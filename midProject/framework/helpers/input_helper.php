<?php
//处理输入的函数文件
function deepslashes($data){
    //判断data的形式
    if (empty($data)) {
        return $data;
    }

    //高级写法
    return is_array($data) ? array_map('deepslashes',$data) : addslashes($data);

    // if (is_array($data)) {
    //     # 是数组
    //     foreach ($data as $v) {
    //         return deepslashes($v);
    //     }
    // } else {
    //     //单一的变量
    //     return addslashes($data);
    // }
}

function deepspecialchars($data){
    if (empty($data)) {
        return $data;
    }
    return is_array($data) ? array_map('deepspecialchars',$data) : htmlspecialchars($data);
}
