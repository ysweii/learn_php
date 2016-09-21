<?php

/**
 * 自动加载类文件函数
 */
function userAutoload($class_name) {
	// var_dump($class_name);echo '&nbsp;';
	//先处理确定的（框架中的核心类）
	// 类名与类文件映射数组
	$framework_class_list = array(
		// '类名' => '类文件地址'
		'Controller' 	=> FRAMEWORK_PATH . 'Controller.class.php',
		'Model' 		=> FRAMEWORK_PATH . 'Model.class.php',
		'Factory' 		=> FRAMEWORK_PATH . 'Factory.class.php',
		'MySQLDB' 		=> FRAMEWORK_PATH . 'MySQLDB.class.php',
		) ;
	//判断是否为核心类
	if (isset($framework_class_list[$class_name])) {
		//是核心类
		require $framework_class_list[$class_name];
	}
	//判断是否为可增加（控制器类，模型类）
	//控制器类，截取后是个字符，匹配Controller
	elseif (substr($class_name, -10) == 'Controller') {
		// 控制器类， 当前平台下controller目录
		require CURRENT_CONTROLLER_PATH . $class_name . '.class.php';
	}
	//模型类，截取后5个字符，匹配Model
	elseif (substr($class_name, -5) == 'Model') {
		// 模型类，当前平台下model目录
		require CURRENT_MODEL_PATH . $class_name . '.class.php';
	}
}
spl_autoload_register('userAutoload');

//目录常量的定义
define('ROOT_PATH', getCWD() . '/');//getCWD()获得当前目录
define('APPLICTION_PATH', ROOT_PATH . 'application/');
define('FRAMEWORK_PATH', ROOT_PATH . 'framework/');

// 确定分发参数
// 平台
$default_platform = 'back';
define('PLATFORM', isset($_GET['p']) ? $_GET['p'] : $default_platform);
// 控制器类
$default_controller = 'Admin';
define('CONTROLLER', isset($_GET['c']) ? $_GET['c'] : $default_controller);
// 动作
$default_action = 'login';
define('ACTION', isset($_GET['a']) ? $_GET['a'] : $default_action);

//当前平台相关的路径常量
define('CURRENT_CONTROLLER_PATH', APPLICTION_PATH . PLATFORM . '/controller/');
define('CURRENT_MODEL_PATH', APPLICTION_PATH . PLATFORM . '/model/');
define('CURRENT_VIEW_PATH', APPLICTION_PATH . PLATFORM . '/view/');

//实例化控制器类,并调用动作方法
$controller_name = CONTROLLER . 'Controller';
//实例化
$controller = new $controller_name();//可变类
//调用方法（action动作）
//拼凑当前的方法动作名字符串
$action_name = ACTION . 'Action';
$controller->$action_name();//可变方法