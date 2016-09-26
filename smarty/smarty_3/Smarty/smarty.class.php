<?php

class Smarty{
    
    
    
    private $tmp_var = array();
    
    public $template_dir = './template/';
    public $templatec_dir = './template_c/';
    
    public function assign($k,$v){
        $this->tmp_var[$k] = $v;
    }
    
    public function display($tpl){
        $this->complie($tpl);
    }
    
    private function complie($tpl){
        $tpl_path = $this->template_dir.$tpl;
        $complie_path = $this->templatec_dir.$tpl.'.php';
        if(file_exists($complie_path) && filemtime($complie_path) > filemtime($tpl_path)){
            require $complie_path;
        } else {
            echo 'create<br>';
            $str = file_get_contents($tpl_path);
            $str = str_replace('{', '<?php echo $this->tmp_var["', $str);
            $str = str_replace('}', '"];?>', $str);
            echo $complie_path;
            file_put_contents($complie_path, $str);
            require $complie_path;
                     
        }
    }
    
}

