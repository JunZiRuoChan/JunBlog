<?php
//视图类
//要负责调用模型解析数据，视图类本身得不到数据，需要提供一种机制，让控制器能把数据存到视图类中：属性和方法
//命名空间
namespace Core;
class View{
	//增加属性保存Smarty对象
	private $smarty;
	public function __construct(){
		include_once VENDOR_DIR.'Smarty/Smarty.class.php';
		$this->smarty = new \Smarty();
		//设置模板文件、编译文件路径等等
		$this->smarty->setTemplateDir(APP_DIR.PLAT.'/View/'. MODULE .'/');
		$this->smarty->setCompileDir(APP_DIR.PLAT.'/View_c/');
	}
	
	//公开方法赋值
	public function assign($name,$value){
		$this->smarty->assign($name,$value);
	}
	//显示数据
	public function display($tpl){
		$this->smarty->display($tpl);
		//$this->smarty->display(APP_DIR.PLAT.'/View/' . $tpl);
	}
}