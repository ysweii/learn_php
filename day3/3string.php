<?php
$s1 = "weics.com";
$v1 = 'ab\nc"d\'efg:$s1';//单引号能识别出：\\  \'
echo "<p>$v1</p>";


$v2 = "ab\nc'd\",\101,\x41,efg:$s1";//双引号识别的：\\ \"  \n   \t  \r  \$
echo "<p>$v2</p>";


$v3 = <<<'ab'
这里就是字符串的内容，几乎可以写任何内容
想写什么就可以写什么，一般这里是可以写代码的部分
这个部分的结束是以分号结尾
ab;
echo "<p>$v3</p>";


$v4 = <<<"abc"
这里就是字符串的内容，几乎可以写任何东西
写啥就是啥，包括回车，tab符，\$符，等等
包括单双引号都可以直接写出，双引号:", \"
通常这里可以方便写大段的html，js代码，并输出
abc;
echo "<p>$v4</p>";
?>