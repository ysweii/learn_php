<?php

class Smarty{
    private $tpl_var = array();
    public function assign($k,$v){
        $this->tpl_var[$k] = $v;
    }
    
    public function complie(){
        $str = file_get_contents('./demo.html');
        $str = str_replace('{', '<?php echo $this->tpl_var["', $str);
        $str = str_replace('}', '"];?>', $str);
        
        file_put_contents('./demo.html.php', $str);
        
        require './demo.html.php';
    }
}

