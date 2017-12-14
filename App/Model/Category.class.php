<?php

	//category表模型

	//命名空间
	namespace Model;

	//引入公共元素
	use \Core\Model;

	class Category extends Model{
		//属性
		protected $table = 'category';

		//获取所有分类
		//$stop_id不需要获取的分类
		public function getAllCategories($stop_id = 0){
			//组织SQL
			$sql = "select c.*,a.a_number from {$this->getTableName()} as c left join (select  count(*) as a_number,c_id from bl_article group by c_id) as a on c.id = a.c_id";

			//执行
			$categories = $this->dao->db_getAll($sql);

			//调用无限极分类
			return $this->noLimitCategories($categories,$stop_id);
		}

		/*
		 * 无限极分类
		 * @param1 array $categories，要分类的数据
		 * @param2 int $parent_id = 0，要寻找的父分类ID
		 * @param3 int $level = 0，当前分类所属的级别
		 * @return array $list，已经分类好的数据
		*/
		//$stop_id控制不获取某个分类及其子分类 
		private function noLimitCategories($categories,$stop_id = 0,$parent_id = 0,$level = 0){
			//定义数组保存有效数据
			static $list = array();

			//循环遍历
			foreach($categories as $cat){
				//匹配
				if($cat['c_parent_id'] == $parent_id){
					//判断当前得到的分类是否不需要
					if($stop_id==$cat['id']) continue;
					//如果当前ID和分类中的ID相同时，也就不再显示分类中ID相应的数据和它的子分类
					//将当前函数中的level加入到分类数据中
					$cat['level'] = $level;
						
					//保存数据
					$list[] = $cat;

					//获取$cat可能存在的所有子分类：递归调用自己
					$this->noLimitCategories($categories,$stop_id,$cat['id'],$level + 1);

					//一种保存数据到一起的方式
					//$sub = $this->noLimitCategories($categories,$cat['id']);
					//$list = array_merge($list,$sub);
				}
			}

			//返回数据
			return $list;
		}


		//通过父分类ID和名字查询分类
		public function checkCategoryName($parent_id,$name){
			//防止SQL注入
			$parent_id = addslashes($parent_id);
			$name = addslashes($name);

			//组织SQL执行
			$sql = "select id from {$this->getTableName()} where c_parent_id = {$parent_id} and c_name = '{$name}'";

			return $this->dao->db_getOne($sql);
		}
		//新增分类入库
		public function insertCategory($name,$parent_id,$sort){
			$sql = "insert into {$this->getTableName()} values(null,'{$name}',$parent_id,$sort)";
			return $this->dao->db_exec($sql);
		}
		//验证指定分类是否存在子分类 
		public function checkLefe($id){
			$sql = "select id from {$this->getTableName()} where c_parent_id = {$id} limit 1";
			return $this->dao->db_getOne($sql);
		}
		//删除无子分类的分类
		public function deleteCategory($id){
			$sql = "delete from {$this->getTableName()} where id = {$id}";
			return $this->dao->db_exec($sql);
		}
		//通过ID获取分类
		public function getCategoryById($id){
			//调用父类公共方法
			return $this->getDateById($id);
			
		}
		//更新数据到数据库
		public function updateCategory($id,$name,$parent_id,$sort){
			$name = addslashes($name);
			$sort = addslashes($sort);
			$sql = "update {$this->getTableName()} set c_name='{$name}',c_parent_id={$parent_id},c_sort={$sort} where id = {$id}";
			return $this->dao->db_exec($sql);
		}
	}