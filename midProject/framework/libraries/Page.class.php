<?php
//分页类
class Page{

    //属性
    private $total;     //总的记录数
    private $pagesize;  //每页显示的页数
    private $current;   //当前的页数
    private $pagenum;   //总的页数
    private $first;     //首页超链接
    private $last;      //末页超链接
    private $prev;      //上一页的超链接
    private $next;      //下一页的超链接
    private $url;       //超链接的地址


    //构造方法
    /**
     *@param script string 超链接地址的文件名，不带任何参数
     *@param params array 超链接地址的参数
     */

    function __construct($total,$pagesize,$current,$script,$params=array()){
        $this->total = $total;
        $this->pagesize = $pagesize;
        $this->current = $current;
        $this->pagenum = ceil( $total / $pagesize );
        //index.php?p=admin&c=brand&a=index&page=2
    	//new分页类 new Page(10,3,2,'index.php',array('p'=>'admin','c'=>'brand','a'=>'index'))
        $temp = array();
        foreach ($params as $k => $v) {
            //首先要形成 p=admin c=brand a=index 的内容，以数组的形式保存
            $temp[] = "$k=$v";
        }

        $str = implode("&",$temp);
        $this->url = "$script?{$str}&page=";
        $this->first = $this->getFirst();
        $this->last = $this->getLast();
        $this->prev = $this->getPrev();
        $this->next = $this->getNext();

    }


    //first url
    private function getFirst(){
        if ($this->current == 1) {
            return "[首页]";
        } else {
            return "<a href = '{$this->url}1'>[首页]</a>";
        }
    }


    private function getLast(){
        //判断是否是最后一页
        if ($this->current == $this->pagenum){
            return "[末页]";
        } else {
            return "<a href='{$this->url}{$this->pagenum}'>[末页]</a>";
        }
    }

    private function getPrev(){
        //判断是否是第一页
        if ($this->current == 1){
            return "[上一页]";
        } else {
            return "<a href='{$this->url}".($this->current - 1)."'>[上一页]</a>";
        }
    }

    private function getNext(){
        //判断是否是最后一页
        if ($this->current == $this->pagenum){
            return "[下一页]";
        } else {
            return "<a href='{$this->url}".($this->current + 1). "'>[下一页]</a>";
        }
    }


    public function showPage(){
        if ($this->pagenum >= 1) {
            return "共有{$this->total}条记录,每页显示{$this->pagesize}条记录，当前的记录为{$this->current}/{$this->pagenum} {$this->prev} {$this->next} {$this->last}";
        } else {
            return "";
        }
    }

}
