<?php

/**
 * 自动加载类文件函数
 */

function userAutoload($class_name){
	//先处理确定的（框架中的核心类）
	//类名与类文件映射数组
	$framework_class_list = array(
		//类名--》类文件地址
		'Controller' => './framework/Controller.class.php',
		'Model' => './framework/Model.class.php',
		'Factory' => './framework/Factory.class.php',
		'MySQLDB' => './framework/MySQLDB.class.php',

		);

	//判断是否是核心类
	if (isset($framework_class_list[$class_name])){
		//是核心类
		require $framework_class_list[$class_name];
	} elseif (substr($class_name, -10) == 'Controller'){
		//判断是否为可增加（控制器类，模型类）
		//控制器类，截取后是个字符，匹配Controller
		require './application/'.PLATFORM.'./controller/'.$class_name.'.class.php';
	} elseif (substr($class_name, -5) == 'Model'){
		//模型类
		require './application/'.PLATFORM.'/model/'.$class_name.'.class.php';
	} 
}

spl_autoload_register('userAutoload');


//确定平台的分发参数
//平台
$default_platform = 'test';
define('PLATFORM',isset($_GET['p']) ? $_GET['p'] : $default_platform);


//确定分发参数
$default_controller = 'Match';
define('CONTROLLER', isset($_GET['c']) ? $_GET['c'] : $default_controller);

//动作
$default_action = 'list';
define('ACTION', isset($_GET['a']) ? $_GET['a'] : $default_action);

//实例化控制器类，并调用此方法
$controller_name = CONTROLLER . 'Controller';
//实例化
$controller = new $controller_name();//可变类
//调用方法  action动作
//平凑当前的方法动作的名字字符串
$action_name = ACTION . 'Action';
$controller->$action_name();