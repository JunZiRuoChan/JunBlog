<?php
//后台评论管理
namespace Back\Controller;
use \Core\Controller;
class Comment extends Controller{
	public function index(){
		global $config;
		//获取页码
		$page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
		
		$comment = new \Model\Comment();
		//获取总记录数
		$counts = $comment->getCounts();
		
		//调用分页类
		$pagestring = \Page::getPageString($counts,'comment','index','back',$config['back_comment_pagecount'],$page);
		//获取所有评论
		$comments = $comment->getAllComments($config['back_comment_pagecount'],$page);
		$this->view->assign('pagestring',$pagestring);
		$this->view->assign('comments',$comments);
		$this->view->display('commentIndex.html');
	}
}