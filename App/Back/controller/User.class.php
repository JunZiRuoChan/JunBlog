<?php
//用户后台管理
namespace Back\Controller;
use \Core\Controller;
class User extends Controller{
	public function index(){
		global $config;
		//获取页码
		$page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
		//调用模型获取所有用户信息
		$user =  new \Model\User;
		//获取所有记录数
		$counts = $user->getCounts();
		//分页功能
		$pagestring = \Page::getPageString($counts,'User','index','back',$config['back_user_pagecount'],$page);
		
		$users = $user->getAllUsers($config['back_user_pagecount'],$page);
		$this->view->assign('users',$users);
		$this->view->assign('pagestring',$pagestring);
		$this->view->display('userIndex.html');
	}
}