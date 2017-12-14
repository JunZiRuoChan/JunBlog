<?php
namespace Home\Controller;

//引入空间元素
//use 空间名\类名 类名如果和当前类中的类名重名，则用as改变
use \Core\Controller;
class Index extends Controller{
	//入口方法
	public function index(){
		//获取所有文章信息
		//获取页码
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] :1;
		//接收可能存在的分类ID（筛选条件）
		$search['c_id'] = isset($_REQUEST['c_id']) ? intval($_REQUEST['c_id']) : 0;

		//获取每页显示数据量
		global $config;
		//获取所有分类及其下对应的文章数量
		$category = new \Model\Category;
		$categories = $category->getAllCategories();

		$article = new \Model\Article;
		$articles = $article->getAllArticles($config['home_article_pagecount'],$page,$search);
		//获取文章数量
		$counts = $article->getCounts($search);

		//获取最新三条数据
		$three = $article->getLatestArticles();
		//调用分页类
		$pagestring = \Page::getPageString($counts,'index','index',PLAT,$config['home_article_pagecount'],$page,$search);

		
		$this->view->assign('three',$three);
		$this->view->assign('categories',$categories);
		$this->view->assign('articles',$articles);
		$this->view->assign('pagestring',$pagestring);
		$this->view->display('blogShowList.html');
	}
	//搜索博文
	public function search(){
		//接收关键字
		$keywords = trim($_REQUEST['keywords']);
		//合法性判断
		if(empty($keywords)){
			$this->error('关键词不能为空！','');
		}
		//调用模型检索数据
		$article = new \Model\Article();
		$articles = $article->searchArticle($keywords);
		if($articles){
			$this->success('请稍等！','');
		}else{
			$this->error('没有关于'.'"'. $keywords.'"'.'的内容！','');
		}
	}
	//退出登录
	public function logout(){
		unset($_SESSION['u']);
		$this->success('退出成功！','');
	}
}