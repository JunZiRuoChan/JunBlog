<?php
//命名空间
namespace Back\Controller;
use \Core\Controller;

class Article extends Controller{
	//显示所有文章		
	public function index(){
		//获取页码
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1; 

		//接收搜索数据
		$search = array();
		if(isset($_REQUEST['c_id'])) $search['c_id'] = intval($_REQUEST['c_id']);
		if(isset($_REQUEST['a_name'])) $search['a_name'] = trim($_REQUEST['a_name']);
		if(isset($_REQUEST['a_status'])) $search['a_status'] = intval($_REQUEST['a_status']);

		//调用模型 取出所有文章信息
		//引入配置文件
		global $config;
		//获取所有显示的分类
		$category = new \Model\Category();
		$categories = $category->getAllCategories();
		$article = new \Model\Article;
		$articles = $article->getAllArticles($config['back_article_pagecount'],$page,$search);
		//获取文章总数量
		$counts = $article->getCounts($search);

		//调用分页类
		$pagestring = \Page::getPageString($counts,'article','index','back',$config['back_article_pagecount'],$page,$search);
		//加载视图显示数据
		$this->view->assign('search',$search);
		$this->view->assign('categories',$categories);
		$this->view->assign('pagestring',$pagestring);
		$this->view->assign('articles',$articles);
		$this->view->display('articleIndex.html');
	}
	//添加文章
	public function add(){
		//调用模型 文章的发布需要关联分类
		global $config;
		$category = new \Model\Category;
		$categories = $category->getAllCategories();//该方法会调用无限级分类方法
		//显示添加表单
		$this->view->assign('categories',$categories);
		$this->view->display('articleAdd.html');

	}
	public function insert(){
		//接收数据
		$data['a_name'] = trim($_POST['title']);
		$data['a_content'] = htmlspecialchars(trim($_POST['content']));
		$data['a_publishtime'] = strtotime(trim($_POST['publishtime']));
		//将字符串的时间通过strtotime变成了时间戳
		//intval 获取变量的整数值
		$data['c_id'] = intval($_POST['category']);
		$data['a_sort'] = 100;
		$data['a_status'] = intval($_POST['status']);
		//合法性验证 标题 内容 时间都不能为空
		if(empty($data['a_name'])||empty($data['a_content'])){
			$this->error('标题、内容都不能为空！','p=Back&m=Article&a=add');
		}
		if (empty($data['a_publishtime'])) {
			$this->error('文章发布日期不能为空！','p=Back&m=Article&a=add');
		}

		//调用模型 数据入库
		$article = new \Model\Article();
		if($article->insertArticle($data)){
			//添加数据成功
			$this->success('文章新增成功！','p=Back&m=Article');
		}else{
			//添加数据失败
			$this->error('文章新增失败！','p=Back&m=Article&a=add');
		}
	}
	//删除文章
	public function delete(){
		//接收文章ID
		$id = intval($_GET['id']);
		//调用模型
		$article = new \Model\Article;
		if($article->deleteArticle($id)){
			//删除成功
			$this->success('删除成功！','p=Back&m=Article');
		}else{
			//删除失败
			$this->error('删除失败！','p=Back&m=Article');
		}
	}
	//编辑文章
	public function edit(){
		//接收数据
		$id = intval($_GET['id']);
		//调用模型获取数据
		$article = new \Model\Article;
		$edit_art = $article->getArticleById($id);
		$category = new \Model\Category;
		$categories = $category->getAllCategories();
		$this->view->assign('edit_art',$edit_art);
		$this->view->assign('categories',$categories);
		$this->view->display('articleEdit.html');
	}
	//编辑文章 数据入库
	public function update(){
		//接收数据
		$id = intval($_POST['id']);
		$data['a_name'] = trim($_POST['title']);
		$data['a_content'] = htmlspecialchars(trim($_POST['content']));
		$data['a_publishtime'] = strtotime(trim($_POST['publishtime']));
		//intval 获取变量的整数值
		$data['c_id'] = intval($_POST['category']);
		$data['a_sort'] = 100;
		$data['a_status'] = intval($_POST['status']);
		//合法性验证 标题 内容 时间都不能为空
		if(empty($data['a_name'])||empty($data['a_content'])){
			$this->error('标题、内容都不能为空！','p=Back&m=Article&a=add');
		}
		if (empty($data['a_publishtime'])) {
			$this->error('文章发布日期不能为空！','p=Back&m=Article&a=add');
		}
		//调用模型更新数据
		$article = new \Model\Article;
		if($article->updateArticle($id,$data)){
			//更新成功！
			$this->success('更新成功！','p=back&m=article');
		}else{
			//更新失败！
			$this->error('更新失败！','p=back&m=article&a=edit&id'.$id);
		}
	}
	
}