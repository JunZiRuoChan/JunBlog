<?php
//图片处理类
class Image{
	//图片资源类型
	private static $type = array(1=>'gif',2=>'jpeg',3=>'png');
	public static $error = '';
	/**
	 * 制作缩略图
	 * @param string $file 原文件资源
	 * @param string $path 存储路径
	 * @param int $width=80 
	 * @param int $height=100
	 */
	public static function thumbImage($fiel,$path,$width=80,$height=100){
		if (!file_exists($file)) {
			self::$error = '原文件不存在！';
			return false;
		}

		//判断文件是否适合做缩略图
		//getimagesize取得图像大小
		//list把数组中的值赋给一些变量
		list($src_width,$src_height,$type) = getimagesize($file)	;
		if ($type!=1&&$type!=2&&$type!=3) {
			self::$error='当前文件类型不能制作缩略图！';
			return false;
		}
		//拼凑打开以及保存的函数类型
		$open = 'imagecreatefrom'.self::$type[$type];
		$save='image'.self::$type[$type];
		//打开原图资源
		$image_src = $open($file);

		//创建缩略图资源
		$image_dst = imagecreatetruecolor($width, $height);

		//采样复制
		if (!imagecopyresampled($image_dst,$image_src,0,0,0,0,$width,$height,$src_width,$src_height)) {
			self::$error = '采样复制出错！';
			return false;
		}
		//生成缩略图名字
		$thumb_name = 'thumb_'.basename($file);
		if (!$save($image_dst,$path.''.$thumb_name)) {
			self::$error = '缩略图保存失败！';
			return false;
		}
		//销毁资源
		imagedestroy($image_src);
		imagedestroy($image_dst);
		return $thumb_name;
	}
}