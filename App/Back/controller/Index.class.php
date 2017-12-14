<?php
//后台首页
namespace Back\Controller;
//引入空间元素
use \Core\Controller;
class Index extends Controller{
	public function Index(){
		//获取所有用户数量
		$user = new \Model\User;
		$counts = $user->getCounts();
		//显示视图
		//分配数据
		$this->view->assign('counts',$counts);
		$this->view->display('index.html');
	}
	public function logout(){
		unset($_SESSION['user']);
		$this->success('您已退出！','p=back&m=privilege');
	}
}