<?php
//前台评论控制器
namespace Home\Controller;
use \Core\Controller;
class Comment extends Controller{
	public function index(){
		//接收数据
		//获取ID
		$id = intval($_POST['id']);
		$content = trim($_POST['comment']);
		//合法性验证
		if (empty($content)) {
			$this->error('评论内容不能为空！','m=article&id='  .$id);
		}
		//调用数据库进行数据插入
		$comment =new \Model\Comment;
		if ($comment->insertComment($id,$content,$_SESSION['u']['id'])) {
			//成功
			$this->success('评论成功！','m=article&id='  .$id);
		}else{
			//失败
			$this->error('评论失败！','m=article&id='  .$id);
		}
		
	}
}