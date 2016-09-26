<?php

class Smarty{
    private $tmp_var = array();
    public function assign($k,$v){
        $this->tmp_var[$k] = $v;
    }
    
    public function complie($tpl){
        $complie_path = $tpl.'.php';
        if(file_exists($complie_path) && filemtime($complie_path) > filemtime($tpl)){
            require $complie_path;
        } else {
            echo 'create<br>';
            $str = file_get_contents($tpl);
            $str = str_replace('{', '<?php echo $this->tmp_var["', $str);
            $str = str_replace('}', '"];?>', $str);
            
            file_put_contents($complie_path, $str);
            require $complie_path;
        }
    }
    
}
        
