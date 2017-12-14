<?php
namespace Core;
class Session extends Model{
	//保存表名字
	protected $table = "session";
	//构造方法 当子类实例化时，有构造方法就不会自动调用父类中的构造方法
	public function __construct(){
		parent::__construct();
		//注册session机制
		session_set_save_handler(array($this,'open'),array($this,'close'),array($this,'read'),array($this,'write'),array($this,'destory'),array($this,'gc'));
		//开启session
		@session_start();
	}
	//实现需要修改session机制的6个方法：open close read write destory gc
	public function open(){
		//建立数据库连接操作，实例化 session时就会继承model构造方法，父类构造方法已经实现了DAO的初始化，连接认证已经建立好
	}
	public function close(){
		//不需要销毁资源
		
	}
	public function read($id){
		// gc在read之后执行 去除脏读数据 ini_get获取配置选项(php.ini中的元素)名称
		$expire = time()-ini_get('session.gc_maxlifetime');
		//通过sessionId从数据库中取出数据，然后得到对应的序列化的session内容，并返回
		$sql = "select s_content from {$this->getTableName()} where s_id = '{$id}' and s_expire >={$expire}";
		//执行SQL
		$res = $this->dao->db_getOne($sql);
		//返回内容 不需要进行反序列化操作
		return isset($res['s_content'] ) ? $res['s_content'] : '';
	}
	public function write($id,$content){
		$now = time();
		//session在脚本运行结束时会主动将session信息写入文件中，所以为防主键冲突
		//session写入频繁，使用同一个sessioId，就要将insert改为replace
		$sql = "replace into {$this->getTableName()} values('{$id}','{$content}',{$now})";
		return $this->dao->db_exec($sql);
	}
	public function destory($id){
		$sql = "delete from {$this->getTableName()} where s_id = '{$id}'";
		return $this->dao->db_exec($sql);
	}
	//gc垃圾回收 系统会自动给一个生命周期来 判断是否过期
	public function gc($lifetime){
		$expire = time()-$lifetime;
		$sql = "delete from {$this->getTableName()} where s_expire < {$expire}";
		return $this->dao->db_exec($sql);
	}
}