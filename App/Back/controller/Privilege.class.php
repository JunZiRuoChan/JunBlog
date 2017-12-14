<?php
//命名空间
namespace Back\Controller;
//引入空间元素
use \Core\Controller;
class Privilege extends Controller{
	//获取登录表单
	public function index(){
		$this->view->display('login.html');
	}
	//获取验证码
	public function getCaptcha(){
		$captcha = new \Captcha;
		$captcha->generate();
	}
	//验证用户登录信息
	public function check(){
		//接收数据
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$captcha = trim($_POST['captcha']);
		if (empty($captcha)||empty($username)||empty($password)) {
			$this->error('用户名、密码和验证码都不能为空','p=back&m=Privilege');
		}
		
		//合理验证
		//验证码验证
		if (!\Captcha::checkCaptcha($captcha)) {
			$this->error('验证码错误！','p=back&m=Privilege');
		}
		//判断数据在数据库中存在(数据查询)
		$admin  = new \Model\Admin;
		//$user = $admin->checkUser($username,$password);
		$user = $admin->getUserByUsername($username);
		if (!$user) {
			$this->error('当前用户名不存在！','p=back&m=Privilege');
		}
		//验证密码
		if ($user['a_password']!=md5($password)) {
			$this->error('密码错误！','p=back&m=Privilege');
		}
		//将用户信息保存到session中，才能实现跨脚本
		$_SESSION['user'] = $user;
		//成功，进入首页
		$this->success('欢迎：'.$username.'进入博客项目后台！','p=Back');
	}
}