<?php

namespace China;
const nation = 'china <br>';
function getInfo(){
    echo 'i am a chinese<br>';
}





namespace USA;
const nation ='usa<br>';
function getInfo(){
    echo 'i am a american<br>';
}




echo '<meta charset="utf-8"/>';
getInfo();
\China\getInfo();
\USA\getInfo();
echo nation;
echo \China\nation;
