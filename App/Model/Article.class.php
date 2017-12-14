<?php

	//文章模型对应article表

	//命名空间
	namespace Model;

	//引入空间元素
	use \Core\Model;

	class Article extends Model{
		//属性
		protected $table = 'article';

		//获取所有的文章
		//@param1 int $pagecount，每页显示的数据量
		//@param2 int $page = 1，当前要显示的页码
		//@param3 array $search = array()，所有检索条件
		public function getAllArticles($pagecount,$page = 1,$search = array()){
			//计算limit数据
			$offset = ($page - 1) * $pagecount;

			//组织where 条件
			$where = $c_id = $a_name = $a_status = '';
			if(isset($search['c_id']) && $search['c_id']) $c_id = " a.c_id = {$search['c_id']} ";
			if(isset($search['a_name']) && $search['a_name']) $a_name = " a.a_name like '%{$search['a_name']}%' ";
			if(isset($search['a_status']) && $search['a_status']) $a_status = " a.a_status = {$search['a_status']} ";

			//拼凑SQL指令
			if($c_id){
				//表示有分类筛选条件
				$where .= $c_id;

				if($a_name) $where .= ' and ' .  $a_name;	  //有名字条件
				if($a_status) $where .= ' and ' .  $a_status; //有状态条件
			}else{
				//没有分类筛选
				if($a_name){
					//有标题条件
					$where .= $a_name;

					if($a_status){
						//当前还有状态条件
						$where .= ' and ' .  $a_status;
					}
				}else{
					//没有标题条件
					$where .= $a_status;
				}
			}

			if($where) $where = ' where ' . $where;
			else $where = ' where 1 ';	//永远为真



			//组织SQL执行
			$sql = "select a.id,a.a_name,a.a_publishtime,a.a_sort,a.a_status,c.c_name,a.a_content,m.m_number from {$this->getTableName()} as a left join bl_category as c on a.c_id = c.id left join (select count(*) as m_number,a_id from bl_comment group by a_id) as m on a.id = m.a_id {$where} limit {$offset},{$pagecount}";

			return $this->dao->db_getAll($sql);
		}

		//获取总记录数
		//@param1 array $search = array()，所有检索条件
		public function getCounts($search = array()){
			//组织where 条件
			$where = $c_id = $a_name = $a_status = '';
			if(isset($search['c_id']) && $search['c_id']) $c_id = " c_id = {$search['c_id']} ";
			if(isset($search['a_name']) && $search['a_name']) $a_name = " a_name like '%{$search['a_name']}%' ";
			if(isset($search['a_status']) && $search['a_status']) $a_status = " a_status = {$search['a_status']} ";

			//拼凑SQL指令
			if($c_id){
				//表示有分类筛选条件
				$where .= $c_id;

				if($a_name) $where .= ' and ' .  $a_name;	  //有名字条件
				if($a_status) $where .= ' and ' .  $a_status; //有状态条件
			}else{
				//没有分类筛选
				if($a_name){
					//有标题条件
					$where .= $a_name;

					if($a_status){
						//当前还有状态条件
						$where .= ' and ' .  $a_status;
					}
				}else{
					//没有标题条件
					$where .= $a_status;
				}
			}

			if($where) $where = ' where ' . $where;
			else $where = ' where 1 ';	//永远为真

			$sql = "select count(*) as c from {$this->getTableName()} {$where}";
			$res = $this->dao->db_getOne($sql);
			return $res ? $res['c'] : 0;
		}

		//数据入库
		public function insertArticle($data){
			//数组元素中所有下标对应的都是数据表中字段名：字段包含所有不允许为空的字段
			//insert into 表名 (字段列表) values (值列表)
	
			//循环遍历构造字段列表和值列表
			$fields = $values = '';
			foreach($data as $k => $v){
				//$k就是字段名，$v就是值
				$fields .= $k . ',';
				$values .= '"' . $v . '",';
			}

			//去除右边逗号
			$fields = rtrim($fields,',');
			$values = rtrim($values,',');

			//构造SQL
			$sql = "insert into {$this->getTableName()} ({$fields}) values({$values})";
			return $this->dao->db_exec($sql);
		}

		//删除文章
		public function deleteArticle($id){
			$sql = "delete from {$this->getTableName()} where id = {$id}";
			return $this->dao->db_exec($sql);
		}

		//通过ID获取文章
		public function getArticleById($id){
			return $this->getDataById($id);
		}

		//更新数据
		public function updateArticle($id,$data){
			//SQL：update 表名 set 字段1 = 值1,字段2=值2... where id = $id

			$update = '';
			foreach($data as $k => $v){
				//$k字段名，$v新值
				$update .= $k . '="' . $v . '",';
			}
			//右侧多出一个逗号
			$update = rtrim($update,',');

			//组织SQL
			$sql = "update {$this->getTableName()} set {$update} where id = {$id}";
			return $this->dao->db_exec($sql);
		}

		//获取文章及相关信息
		public function getArticleInfoById($id){
			$sql = "select a.*,c.c_name from {$this->getTableName()} as a left join bl_category as c on a.c_id = c.id where a.id = {$id}";

			return $this->dao->db_getOne($sql);
		
		}

		//点赞功能
		public function updateZan($id){
			//组织SQL执行
			$sql = "update {$this->getTableName()} set a_zan = a_zan + 1 where id = {$id}";
			return $this->dao->db_exec($sql);
		}


		//获取最新三条记录
		public function getLatestArticles(){
			//组织SQL并执行
			$sql = "select a_name,id from {$this->getTableName()} order by a_publishtime desc limit 3";

			return $this->dao->db_getAll($sql);
		}

	}