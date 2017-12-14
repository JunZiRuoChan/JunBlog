<?php
//公共模型
//命名空间
namespace Core;
use \Core\MyPDO;
class Model{
	//属性：保存PDO类
	protected $dao;
	//构造方法，数据库连接认证，实现DAO的实例化
	public function __construct(){
		$this->dao = new MyPDO;
	}
	//构造表名的方法
	protected function getTableName(){
		//获取表前缀
		global $config;
		$type = $config['type'];
		return $config[$type]['prefix'] . $this->table;
	}
	protected function getdateById($id){
		//组织sql
		$sql = "select * from {$this->getTableName()} where id = {$id}";
		//执行
		return $this->dao->db_getOne($sql);
	}

}