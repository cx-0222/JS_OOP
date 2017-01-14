<?php
	//定义一个类 ！！！注意 类没有小括号
	class Captcha{
		//定义属性
		private $width = 200;
		private $height = 100;
		//验证码字符的个数
		private $chars = 5;
		//干扰线的条数
		private $lines = 20;
		//干扰点 spots 像素
		private $spots = 600;
		
		public function createCanvas(){
			//imagecreatetruecolor() 返回一个图像标识符，代表了一幅大小为 width 和 height 的黑色图像。 
			$img = imagecreatetruecolor($this->width, $this->height);
			//imagecolorallocate — 为一幅图像分配颜色
			$bg = imagecolorallocate($img, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
			//给画布填充颜色
			//imagefill() 在 image 图像的坐标 x，y（图像左上角为 0, 0）处
			//用 color 颜色执行区域填充（即与 x, y 点颜色相同且相邻的点都会被填充）。 
			imagefill($img, 50, 50, $bg);
			
			//增加验证码
			$captcha = $this->getCaptcha();
			$str = imagecolorallocate($img, mt_rand(50,100), mt_rand(50,100), mt_rand(50,100));
			//设置验证码的随机位置
			$e_width = $this->width - $this->chars * 10 -10;
			$e_height = $this->height/2;
			//imagestring — 水平地画一行字符串
			//5 表示使用内置字体
			imagestring($img, 5, mt_rand(10,$e_width),mt_rand($e_height-1,$e_height),$captcha,$str);
			$this->getLines($img);
			$this->getPixels($img);
			//说明这是一个图片格式的
			header("content-type:image/png");
			//imagepng — 以 PNG 格式将图像输出到浏览器或文件
			imagepng($img);
			//imagedestroy() 释放与 image 关联的内存。image 是由图像创建函数返回的图像标识符
			imagedestroy($img);
		}
		
		//获取验证码内容
		private function getCaptcha(){
			$str = "abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
			$captcha = '';
			for($i=0;$i < $this->chars; $i++){
				//mt_rand — 生成更好的随机数 min 默认为0  max必填
				$captcha .= $str[mt_rand(0,strlen($str) - 1)];
			}
			return $captcha;
		}
		//获取干扰线
		private function getLines($img){
			for ($i=0; $i < $this->lines; $i++) { 
				//随机线的颜色
				$lineColor = imagecolorallocate($img, mt_rand(100,200), mt_rand(100,200), mt_rand(100,200));
				//imageline() 用 color 颜色在图像 image 中从坐标 x1，y1 到 x2，y2（图像左上角为 0, 0）画一条线段。 
				imageline($img, mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height), $lineColor);
			}
		}
		//获取干扰点
		private function getPixels($img){
			for ($i=0; $i < $this->spots; $i++) { 
				$spotsColor = imagecolorallocate($img, mt_rand(100,200), mt_rand(100,200), mt_rand(100,200));
				//imagesetpixel() 在 image 图像中用 color 颜色在 x，y 坐标（图像左上角为 0，0）上画一个点。
				imagesetpixel($img, mt_rand(0,$this->width),mt_rand(0,$this->height), $spotsColor);
			}
		}
	}
?>