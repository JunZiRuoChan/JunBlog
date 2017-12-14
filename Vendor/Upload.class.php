<?php
//文件上传类
class Upload{
	//对图片进行限定 MIME限定
	private static $image_type = array("image/jpg","image/jpeg","image/gif","image/png");
	//记录错误信息
	public static $error = '';
	/**
	 * @param array $file 上传文件信息（5个）
	 * @param string $path 上传路径
	 * @return string $new_name 文件保存后的新名字
	 */
	public static function uploadImage($file,$path){
		//判定
		if (!is_file($file)||!isset($file['error'])) {
			//不是上传数组
			self::$error = '错误操作！' ;
			return false;
		}
		//文件类型刷新
		if (!in_array($file['type'], self::$image_type)) {
			self::$error="当前上传的文件类型不允许！" ;
			return false;
		}
		//判断文件是否上传成功
		switch ($file['error']) {
			case 1:
				self::$error = '文件过大！';
				return false;
			case 2:
				self::$error = '文件过大！';
				return false;
			case 3:
				self::$error = '文件部分上传成功！';
				return false;
			case 4:
				self::$error = '没有选中文件！';
				break;
			case 6:
				self::$error = '临时文件不存在！';
				break;
			case 7:
				self::$error = '文件上传失败！';
				break;
		}
		//获取文件新名字
		$new_name = self::getNewName($file['name']);
		//转存
		if (move_uploaded_file($file['tmp_name'], $path.'/'.$new_name)) {
			return $new_name;
		}else{
			self::$error = "文件上传到指定文件夹失败！";
			return false;
		}
	}
	//获取新名字
	private static function getNewName($filename){
		$newname = data("Y-m-d H:i:s");
		$arr = array_merge(range('a', 'z'),range('A', 'Z'));
		shuffle($arr);
		$newname.=$arr[0].$arr[1].$arr[2].$arr[3];
		$newname.='.'.strchr($filename,',');
		return $newname;
	}
}