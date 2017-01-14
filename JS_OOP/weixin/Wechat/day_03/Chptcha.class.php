<?php 
class Chptcha{ 
    private $width=200;
    private $height=100;
    private $chars=5;
    private $lines=20; 
    //干扰点
    private $spots=600; 
    public function generate(){ 
        //制作画布
        //图像生成   imagecreatetruecolor需要用imagefill()来填充颜色
        $img=imagecreatetruecolor($this->width,$this->height);        
        //在画布资源下分配颜色，经验，画布颜色要明亮点
        $bg=imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));//图形处理
        //给画布填充颜色
        imagefill($img,50,50,$bg);///////////////////////???00
        //增加验证码 
        $captcha=$this->getCaptcha();
        $str=imagecolorallocate($img,mt_rand(50,100),mt_rand(50,100),mt_rand(50,100));//随机整数mt
            //获取随机位置
            //宽度: 使用图片宽度减去文件宽度
            $e_width = $this->width - $this->chars * 10 - 10;
            $e_height = $this->height/2; 
        //5，代表的是字体的大小
            imagestring($img,5,mt_rand(10,$e_width),mt_rand($e_height-1,$e_height),$captcha,$str);
            $this->getLines($img);
            $this->getPixels($img);
	    		header('content-type:image/png');
        		imagepng($img); 
            //释放资源
            imagedestroy($img);
    } 
    private function getCaptcha(){
            //产生随机字符串
            $str = 'abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
            $captcha = '';
            for($i = 0;$i < $this->chars;$i++){
                $captcha .= $str[mt_rand(0,strlen($str) - 1)];
            } 
            //返回
            return $captcha;
    } 
    private function getLines($img){
            //增加干扰线
            for($i = 0;$i < $this->lines;$i++){
                //分配颜色
                $line= imagecolorallocate($img,mt_rand(100,200),mt_rand(100,200),mt_rand(100,200));
                //制作线段
                imageline($img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$line);
            }
    }
    private function getPixels($img){
        //增加干扰点
        for($i = 0;$i < $this->spots;$i++){
            //分配颜色 
            $pixel= imagecolorallocate($img,mt_rand(100,200),mt_rand(100,200),mt_rand(100,200));
            //制作
            imagesetpixel($img,mt_rand(0,$this->width),mt_rand(0,$this->height),$pixel);
        }
    }
}