<?php
/**
 * 项目中的工厂类
 */
class Factory{
	/**
	 * 生成模型的单例对象
	 */
	public static function M($model_name){
		static $model_list = array();
		if (!isset($model_list[$model_name])) {
			//没有实例过
			require './'.$model_name.'.class.php';
			$model_list[$model_name] = new $model_name;
		}
		return $model_list[$model_name];
	}
}