<?php

//项目中的工厂类

class Factory {
	//生成单例模型对象
	public static function M($model_name){
		static $model_list = $array();
		//判断当前的模型是否已经实例化
		if (!isset($model_list[$model_name])){
			//没有实例化
			$model_list[$model_name] = new $model_name;
		}

		return $model_list[$model_name];
	}

}