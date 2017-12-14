<?php
//评论模型
namespace Model;
use \Core\Model;
class Comment extends Model{
	protected $table = "comment";
	//数据入库方法
	public function insertComment($id,$content,$u_id){
		$now = time();
		$sql = "insert into {$this->getTableName()} values(null,'{$content}',{$id},{$u_id},{$now})";
		return $this->dao->db_exec($sql);
	}
	//获取所有的评论
	public function getCommentByAid($aid){
		$sql = "select c.*,u.u_username from {$this->getTablename()} as c left join bl_user as u on c.u_id = u.id where c.a_id = {$aid}";
		return $this->dao->db_getAll($sql);
	}
	//获取所有文章的所有评论
	public function getAllComments($pagecount,$page){
		$offset = ($page-1)*$pagecount;
		//获取用户名字以及文章对应的名字
		$sql = "select c.*,u.u_username,a.a_name from {$this->getTableName()} as c left join bl_user as u on c.u_id = u.id left join bl_article as a on c.a_id = a.id limit {$offset},{$pagecount}";
		return $this->dao->db_getAll($sql);

	}
	//获取总记录数
	public function getCounts(){
		$sql = "select count(*) as  c from {$this->getTableName()}";
		$res =  $this->dao->db_getOne($sql);
		return $res ? $res['c'] : 0;
	}
}