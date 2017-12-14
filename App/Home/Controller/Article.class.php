<?php
namespace Home\Controller;
use \Core\Controller;
class Article extends Controller{
	public function index(){
		$id = intval($_GET['id']);
		$article = new \Model\Article;
		$art=$article->getArticleInfoById($id); //获取文章需要带分类名字
		//获取所有的评论
		$comment = new \Model\Comment();
		$comments = $comment->getCommentByAid($id);
		//获得总记录数
		$counts = $comments ? count($comments) :0;
		$this->view->assign('comments',$comments);
		$this->view->assign('counts',$counts);
		$this->view->assign('art',$art);
		$this->view->display('blogShow.html');
	}
	//点赞功能
	public function zan(){
		//判断有无评论的权限
		if (!isset($_SESSION['u'])) {
			$this->error("还没有登录，不能点赞！",'m=article&id='.$id);
		}
		$id = intval($_GET['id']);
		//判断当前文章是否已经点赞
		if (isset($_SESSION['zan']) && in_array($id, $_SESSION['zan'])) {
			//已经点过赞
			$this->error('当前文章已经点过赞了！','m=article&id='.$id);
		}
		//调用模型进行更新操作
		$article = new \Model\Article;
		if($article->updateZan($id)){
			$_SESSION['zan'][] = $id;	//将当前点赞记录对应的文章加入到记录中
			//成功
			$this->success("点赞成功！",'m=article&id='.$id);
		}else{
			//失败
			$this->error("点赞失败！",'m=article&id='.$id);
		}
	}
}