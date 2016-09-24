<?php

//xpath
$doc = new DOMDocument();
$doc->preserveWhiteSpace= false;
$doc->load('books.xml');
$xpath = new DOMXPath($doc);

//查询所有的书
$query = "/books/book/name";
$result = $xpath->query($query);
foreach ($result as $bookname){
    echo $bookname->nodeValue,'<br>';
}

echo '<br>===============================================<br>';

//2  查询所有的静态的书籍
$query = "/books/book[@type='高级语言']/name";
$result = $xpath->query($query);
foreach ($result as $bookname){
    echo $bookname->nodeValue,"<br>";
}

echo '<br>===============================================<br>';

//通过定位来查询
$query = "/books/book[position()=3]/name";
$result= $xpath->query($query);
foreach ($result as $bookname){
    echo $bookname->nodeValue,"<br>";
}

echo '<br>===============================================<br>';

