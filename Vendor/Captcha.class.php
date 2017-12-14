<?php
//验证码工具类
class Captcha{
	//保存验证码图片基本数据
	private $width;
	private $height;
	private $length;
	private $font;
	private $dots;
	private $lines;
	public function __construct($arr=array()){
		$this->width=isset($arr['width'])?($arr['width']):220;
		$this->height=isset($arr['height'])?($arr['height']):30;
		$this->length=isset($arr['length'])?($arr['length']):4;
		$this->font=isset($arr['font'])?($arr['font']):'./Vendor/Fonts/simkai.ttf';
		$this->dots=isset($arr['dots'])?($arr['dots']):50;
		$this->lines=isset($arr['lines'])?($arr['lines']):3;
	}	
	//制作验证码图片
	public function generate(){
		//制作画布
		$image = imagecreatetruecolor($this->width, $this->height);
		//背景色
		$bgcolor = imagecolorallocate($image, mt_rand(200,255), mt_rand(200,255),mt_rand(200,255));
		//填充
		imagefill($image, 0, 0, $bgcolor);
		//内容
		$string_arr = array_merge(range(1, 9),range('a', 'z'),range('A', 'Z'));
		$captcha = '';
		for ($i=0; $i < $this->length; $i++) { 
			shuffle($string_arr);
			//保存内容
			$captcha .= $string_arr[0];
			$str_c = imagecolorallocate($image, mt_rand(0,100), mt_rand(0,100), mt_rand(0,100));
			$ceil = ceil($this->width/($this->length + 1));
			imagettftext($image, mt_rand(10,20), mt_rand(-45,45), $ceil*($i+1), mt_rand(20,25), $str_c, $this->font, $string_arr[0]);
		}
		//干扰点和干扰线
		for ($i=0; $i < $this->dots; $i++) { 
			$dots_c = imagecolorallocate($image, mt_rand(150,200), mt_rand(150,200), mt_rand(150,200));
			imagestring($image, mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$dots_c);
		}
		for ($j=0; $j < $this->lines; $j++) { 
			$lines_c = imagecolorallocate($image, mt_rand(100,150), mt_rand(100,150), mt_rand(100,150));
			imageline($image, mt_rand(0,$this->width), mt_rand(0,$this->height), mt_rand(0,$this->width), mt_rand(0,$this->height), $lines_c);
		}
		//将字符串内容保存到session中
		@session_start();
		$_SESSION['captcha'] = $captcha;
		//保存输出
		header("Content-type:image/png");
		imagepng($image);
		//销毁资源
		imagedestroy($image);
	}
	//校验验证码功能
	public static function checkCaptcha($captcha){
		//$captcha是用户提交的验证码数据，验证的时候不区分大小写
		@session_start();
		return strtolower($_SESSION['captcha'])==strtolower($captcha);
	}
}
