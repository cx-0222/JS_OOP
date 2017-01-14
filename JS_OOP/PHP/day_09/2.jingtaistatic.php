<?php
	/**
	 * 
	 */
	class Stat {
		//静态的属性和方法不需要对象来调用就可以直接用
		static $name = "cx";
		static function say(){
			echo self::$name;
		}
		static function haha(){
			echo "haha被调用了";
		}
	}
	Stat::say();
?>