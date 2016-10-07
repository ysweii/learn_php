<?php


namespace China\Beijing\Haidian;
function getInfo(){
    echo "这个是China\Beijing\HaiDian的命名空间的方法<br>";
}




namespace China\Beijing;
function getInfo(){
    echo "锄禾日当午<br>";
}

echo "<meta charset=UTF-8>";
getInfo();
Haidian\getInfo();
\China\Beijing\Haidian\getInfo();