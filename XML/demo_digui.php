<?php

function getChild($node){
    echo "<ul>";
    if ($node->nodeType == 3){
        echo "<li>".$node->nodeValue."</li>";   //是值节点  直接去除值
    } else {
        //不是值节点
        echo "<li>".$node->nodeName."</li>";    //取出元素节点的名称
        if ($node->attributes->length>0){   //节点的属性的个数大于0
            foreach ($node->attributes as $attr){
                echo "<li>". $attr->value ."</li>";
            }
        }
        
        foreach ($node->childNodes as $child){
            //遍历循环子元素
            getChild($child);
        }
    }
    
    echo '</ul>';
}

$doc = new DOMDocument();
$doc->preserveWhiteSpace=false; //不保护空格   就是导入xml的是时候再取出掉空格
$doc->load('books.xml');
$root = $doc->documentElement;
getChild($root);

