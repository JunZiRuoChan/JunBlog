<?php
//User表对应的模型
namespace Model;
use \Core\Model;
class User extends Model{
	protected $table = 'user';
	//验证用户名是否存在
	public function checkUserByUsername($username){
		//防止SQL注入
		$username = addslashes($username);
		$sql = "select id from {$this->getTableName()} where u_username = '{$username}'";
		return $this->dao->db_getOne($sql);
	}	
	//验证邮箱是否已被注册
	public function checkUserByEmail($email){
		//防止SQL注入
		$email = addslashes($email);
		$sql = "select id from {$this->getTableName()} where u_email = '{$email}'";
		return $this->dao->db_getOne($sql);
	}
	//数据入库
	public function insertUser($username,$password,$email){
		$password = md5($password);
		$now = time();
		$sql = "insert into {$this->getTableName()} values(null,'{$username}','{$password}','{$email}',$now)";
		return $this->dao->db_exec($sql);
	}
	//登录验证
	public function getUserByUsername($username){
		$username = addslashes($username);
		$sql = "select * from {$this->getTableName()} where u_username = '{$username}'";
		return $this->dao->db_getOne($sql);
	}
	//获取所有User信息 分页获取
	public function getAllUsers($pagecount,$page=1){
		$offset = ($page-1)*$pagecount;

		$sql = "select * from {$this->getTableName()} limit {$offset},{$pagecount}";
		return $this->dao->db_getAll($sql);
	}
	//获取user个数
	public function getCounts(){
		$sql = "select count(*) as u from {$this->getTableName()}";
		$u = $this->dao->db_getOne($sql);
		return $u ? $u['u'] : 0;
	}
}