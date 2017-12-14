<?php
//前台用户管理
namespace Home\Controller;
use \Core\Controller;
class User extends Controller{
	public function register(){
		//接收方式
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		//合法性验证
		if (empty($username)||empty($email)||empty($password)) {
			$this->error('用户名、密码和邮件都不能为空！','');
		}
		//合理性验证 用户名和邮箱应该唯一
		$user = new \Model\User();
		if($user->checkUserByUsername($username)){
			//用户名已经存在
			$this->error('当前用户名' .$username. '已经存在！','');
		} 
		if ($user->checkUserByEmail($email)) {
			//邮箱已经使用
			$this->error('当前邮箱' .$email. '已被注册！','');
		}
		//入库
		if($user->insertUser($username,$password,$email)){
			//入库成功 
			$this->success("注册成功！",'');
		}else{
			$this->error("注册失败！",'');
		}
	}
	//用户登录
	public function index(){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		//合法性验证
		if (empty($username)||empty($password)) {
			$this->error('用户名和密码都不能为空！','');
		}
		//合理性验证
		$user = new \Model\User;
		$u = $user->getUserByUsername($username);
		if (!$u) {
			$this->error('用户名不存在！','');
		}
		if ($u['u_password']!=md5($password)) {
			$this->error('密码错误！','');
		}
		//跳转 跨脚本 保存用户数据到session中
		$_SESSION['u'] = $u;
		$this->success('欢迎登录博客系统！','');
	}
}