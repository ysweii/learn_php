<?php

$array =array(array('name' => 'PHP','type' => '脚本语言'), 
        array('name' => 'XML', 'type' => '标记语言'),
        array('name' => 'JAVA', 'type' => '高级语言'));

$doc = new DOMDocument('1.0', 'utf-8'); //设置版本号和字符编码
$doc->formatOutput = true;  //格式化输出

$books = $doc->createElement('books');   //创建一个节点
foreach ($array as $value){
    $book = $doc->createElement('book');
    $name = $doc->createElement('name', $value['name']);  //创建name节点并且赋值
    $books->appendChild($book);
    $book->appendChild($name);
    $book->setAttribute('type', $value['type']);    //添加属性
}

$doc->appendChild($books);
$doc->save('books.xml');
echo '写入成功';


