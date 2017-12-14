<?php  
#初始化文件
#命名空间
namespace Core;
#权限判定
if(!defined('ACCESS')) header('Location:../index.php');
#定义类
class App{
	#初始化字符集
	private static function initCharset(){
		header("Content-type:text/html;charset=utf-8");
	}
	# 初始化目录常量
	private static function initDirConst(){
		define("ROOT_DIR", str_replace('Core','', str_replace("\\", "/", __DIR__)));
		define("CORE_DIR", ROOT_DIR . 'Core/');
		define("CONFIG_DIR", ROOT_DIR .'Config/');
		define("PUBLIC_DIR", ROOT_DIR .'Public/');
		define("VENDOR_DIR", ROOT_DIR .'Vendor/');
		define("APP_DIR", ROOT_DIR .'App/');
	}
	#初始化系统设置
	private static function initSystem(){
		@ini_set('error_reporting', E_ALL);
		@ini_set('display_errros', 1);
	}
	#初始化配置文件
	private static function initConfig(){
		#全局化配置文件
		global $config;
		#加载配置文件
		$config = include_once CONFIG_DIR .'config.php';
	}
	#初始化URL
	#从URL中获取三个数据：平台、控制器、方法
	private static function initUrl(){
		$plat = isset($_REQUEST['p']) ? $_REQUEST['p']:'Home';
		$module = isset($_REQUEST['m']) ? $_REQUEST['m']:'Index';
		$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

		#定义为常量
		define('PLAT', $plat);
		define('MODULE', $module);
		define('ACTION', $action);
	}
	#加载多个方法，加载不同文件夹下的类
	private static function loadCore($clsname){
		$file = CORE_DIR . basename($clsname) .'.class.php';
		if (is_file($file)) {
			include_once $file;
		}
	}
	private static function loadVendor($clsname){
		$file=VENDOR_DIR . basename($clsname) .'.class.php';
		if (is_file($file)) {
			include_once $file;
		}
	}
	private static function loadController($clsname){
		$file=APP_DIR . PLAT . '/Controller/'. basename($clsname) .'.class.php';
		if (is_file($file)) {
			include_once $file;
		}
	}
	private static function loadModule($clsname){
		$file = APP_DIR .'/Model/' .basename($clsname) . '.class.php';
		if (is_file($file)) {
			include_once $file;
		}
	}
	#初始化自动加载
	private static function initAutoload(){
		spl_autoload_register(array(__CLASS__,'loadCore'));
		spl_autoload_register(array(__CLASS__,'loadVendor'));
		spl_autoload_register(array(__CLASS__,'loadController'));
		spl_autoload_register(array(__CLASS__,'loadModule'));
	}
	#分发控制器
	private static function initDispatch(){
		#找到控制器类，实例化调用方法
		$action = ACTION;
		#补充空间
		$module = "\\" . PLAT ."\\Controller\\" . MODULE;
		$m = new $module;
		$m->$action();
	}
	#调用session类 必须在分发控制器之前调用session
	#为避免每调用一个控制器都调用一次session,所以要在分发控制器之前就要调用session
	private static function initSession(){
		$session = new Session;
		//不在此开启session,是因为每次使用都是一次性的
	}
	public static function run(){
		self::initCharset();
		self::initDirConst();
		self::initSystem();
		self::initConfig();
		self::initUrl();
		self::initAutoload();
		self::initSession();
		self::initDispatch();
	}
}