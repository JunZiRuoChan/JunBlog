<?php
//封闭底层系统PDO类
//命名空间
namespace Core;
//使用异常处理
//引用空间元素
use \PDO;
use \PDOException;
class MyPDO{
	//连接数据库数据的属性
	private $type;
	private $host;
	private $port;
	private $user;
	private $pass;
	private $dbname;
	private $charset;
	private $pdo;
	//构造方法，初始化PDO连接
	public function __construct($pdoinfo=array()){
		global $config;
		$this->type = isset($pdoinfo['type']) ? $pdoinfo['type'] : $config['type'];
		$this->host = isset($pdoinfo['host']) ? $pdoinfo['host'] : $config[$this->type]['host'];
		$this->port = isset($pdoinfo['port']) ? $pdoinfo['port'] : $config[$this->type]['port'];
		$this->user = isset($pdoinfo['user']) ? $pdoinfo['user'] : $config[$this->type]['user'];
		$this->pass = isset($pdoinfo['pass']) ? $pdoinfo['pass'] : $config[$this->type]['pass'];
		$this->dbname = isset($pdoinfo['dbname']) ? $pdoinfo['dbname'] : $config[$this->type]['dbname'];
		$this->charset = isset($pdoinfo['charset']) ? $pdoinfo['charset'] : $config[$this->type]['charset'];
		//建立PDO连接
		try{
			$this->pdo = new PDO("{$this->type}:host={$this->host};port={$this->port};dbname={$this->dbname};charset={$this->charset}",$this->user,$this->pass);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo "PDO初始化连接数据库失败！<br />";
			echo "失败文件为：".$e->getFile()."<br />";
			echo "失败行为为：".$e->getLine()."<br />";
			echo "失败原因为：".$e->getMessage()."<br />";
			exit;
		}
	}
	//写入数据
	public function db_exec($sql){
		try{
			return $this->pdo->exec($sql);
		}catch(PDOException $e){
			echo "PDO初始化连接数据库失败！<br />";
			echo "失败文件为：".$e->getFile()."<br />";
			echo "失败行为为：".$e->getLine()."<br />";
			echo "失败原因为：".$e->getMessage()."<br />";
			exit;
		}
	}
	//获取自增长ID
	public function db_insertID(){
		return $this->pdo->lastInsertId();
	}
	//读取一条数据
	public function db_getOne($sql){
		return $this->db_query($sql);
	}
	//读取多条数据
	public function db_getAll($sql){
		return $this->db_query($sql,true);
	}
	public function db_query($sql,$all=false){
		try{
			$stmt = $this->pdo->query($sql);
			return $all ? $stmt ->fetchAll(PDO::FETCH_ASSOC):$stmt ->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
				echo 'SQL执行失败<br/>';
				echo '失败SQL指令为：' . $sql . '<br/>';
				echo '失败行为：'	. $e->getLine() . '<br/>';
				echo '失败原因为：' . $e->getMessage() . '<br/>';
				exit;	//终止脚本继续执行
			}
	}
}