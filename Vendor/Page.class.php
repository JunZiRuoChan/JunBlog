<?php
//分页工具类
class Page{
	/**
	 * @param int $counts 总记录数
	 * @param string $controller 控制器
	 * @param string $action 方法
	 * @param string $plat 平台
	 * @param int $pagecount =5 每页显示记录
	 * @param int $page=1 当前页码
	 * @param array $search=array() 其他条件：下标要对应的数据库字段名
	 */
	public static function getPageString($counts,$controller,$action,$plat,$pagecount=5,$page=1,$search=array()){
		$pages = ceil($counts/$pagecount);
		$url = 'index.php?p='.$plat.'&m='.$controller.'&a='.$action;
		//拼凑用户检索条件
		$s = '';
		foreach($search as $k => $v){
			$s .= '&' . $k . '=' . $v;
		}
		$url .= $s;
		$prev = $page>1?$page-1:1;
		$next = $page<$pages?$page+1:$pages;

		//分页字符串
		$pagestring = '';
		if ($page>1) $pagestring.="<li><a href='{$url}&page={$prev}'>上一页</a></li>";
		if ($pages<=10) {
			for ($i=1; $i <=$pages; $i++) { 
				$pagestring.="<li><a href='{$url}&page={$i}'>{$i}</a></li>";
			}
			//判断当前页码是否属于最后一个
			if ($page!=$pages) {
				$pagestring.="<li><a href='{$url}&page={$next}'>下一页</a></li>";
			}
			// 返回数据
			return $pagestring;
		}
		if ($page>6) {
			if ($page+4<=$pages) {
				for ($i=$page-5; $i <=$page+4; $i++) { 
					$pagestring.="<li><a href='{$url}&page={$i}'>{$i}</a></li>";
				}
			}else{
				for ($i=$pages-9; $i <=$pages; $i++) { 
					$pagestring.="<li><a href='{$url}&page={$i}'>{$i}</a></li>";
				}
			}
		}else{
			for ($i=1; $i <=10; $i++) { 
				$pagestring.="<li><a href='{$url}&page={$i}'>{$i}</a></li>";
			}		}
		if ($page!=$pages) {
			$pagestring.="<li><a href='{$url}&page={$next}'>下一页</a></li>";
		}
		return $pagestring;
	}
}