<?php

class Upload{
    private $path;//文件上传目录
    private $max_size;//文件上传大小限制
    private $errno; //错误的代号
    private $mime = array('image/jpeg','image/png','image/gif');//允许文件上传的类型


    //构造函数
    public function __construct($path = UPLOAD_PATH){
        $this->path = $path;
        $this->max_size = 1000000;
    }


    //文件上传的方法
    public function up($file){
        //判断是否是从浏览器成功上传到服务器

        if ($file['error'] == 0) {
            //上传类型判断
            if(!in_array($file['type'],$this->mime)) {
                //类型不对
                $this->errno = -1;
                return false;
            }


            //判断文件的大小
            if ($file['size'] > $this->max_size){
                //文件大小超过文件上传的限制
                $this->errno = -2;
                return false;
            }


            //获取文件上传的路径
            $sub_path = date('Ymd') . '/';
            if (!is_dir($this->path . $sub_path)) {
                //不存在该目录  创建该目录
                mkdir($this->path . $sub_path);
            }

            //文件名重名  由当前的日期 + 随机数 +  后缀名
            $file_name = date('YmdHis') . uniqid().strrchr($file['name'],'.');

            //准备就绪  开始上传
            if (move_uploaded_file($file['tmp_name'], $this->path. $sub_path . $file_name)){
                //移动成功
                return $sub_path . $file_name;
            } else {
                //移动失败
                $this->errno = -3;
                return false;
            }
        } else {
            //上传到临时文件夹失败  根据其错误的设置错误号
            $this->errno = $file['error'];
            return false;
        }
    }

    //多文件上传的方法
    public function multiUp($files){
        //多文件上传的时候 上传文件的信息 又是一个多维数组
        //我们只需要遍历数组 得到每个上传文件的信息  一次调用up方法就可以了
        foreach ($files['name'] as $key => $value){
            $file['name'] = $files['name'][$key];
            $file['type'] = $files['type'][$key];
            $file['tmp_name'] = $files['tmp_name'][$key];
            $file['error'] = $files['error'][$key];
            $file['size'] = $files['size'][$key];

            //调用up方法  完成上传
            $filename[] = $this->up($file);
        }

        return $filename;
    }


    //根据错误的代号给出相应的错误提示
    public function error(){
        switch ($this->errno){
            case -1:
                return "请检查你的文件类型，目前支持的类型有". implode(",",$this->mime);
                break;
            case -2:
                return '文件超出系统规定的大小，最大不能超过'. $this->max_size;
                break;
            case -3:
                return '文件移动失败';
                break;
            case 1:
                return '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值,其大小为'.ini_get('upload_max_filesize');
                break;
        }
    }



}
