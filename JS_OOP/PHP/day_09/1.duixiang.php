<?php
	/**
	 * 
	 */
	class Student {
		public $name = "cx";
		private $age = "18";
		
		const PI = 3.14;
		//方法不加修饰符 默认为是public 但属性必须加！！！
		function say(){
			//$this代表我们当前调用这个方法的对象
			echo $this->age;
			echo "<br>";
			$this->haha();
			echo "<br>";
			//self代表我们当前类
			echo self::PI;
		}
		protected function haha(){
			echo "<br>";
			echo $this->name."今年".$this->age."岁了";
		}
		
	}
	$stu = new Student();
	echo "<br>";
	var_dump($stu);
	echo "<br>";
	$stu->say();
	//私有的和受保护的都不可以在类外部使用
	//$stu->haha();
	echo "<br>";
	echo Student::PI;
?>