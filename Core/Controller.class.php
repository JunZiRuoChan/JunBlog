<?php
#公共控制器 保证这些代码在每个具体的业务控制器中使用
namespace Core;
class Controller{
	//实例化视图类
	protected $view;
	public function __construct(){
		//权限判定:前台不需要！
		
		if (strtolower(PLAT) == 'back'&& strtolower(MODULE)!='privilege'&&!isset($_SESSION['user'])) {
			$this->error('没有登录！','p=back&m=Privilege');
		}
		$this->view = new View;
	}
	//公共方法
	protected function success($msg,$url,$time=1){
		header("Refresh:{$time};url='index.php?{$url}'");
		echo $msg;
		exit();
	}
	protected function error($msg,$url,$time=3){
		header("Refresh:{$time};url='index.php?{$url}'");
		echo $msg;
		exit();

	}
}
