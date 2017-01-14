<?php
	//一、类 
	class Student {
		//1.属性
		private $name = "cx";
		private $age = "18";
		//常量：在类中定义常量，即不会在类中改变的值
		const PI = 3.14;
		//2.方法
			//方法不加修饰符 默认是public类 但属性不加会报错
		protected function say(){
			echo "哈哈哈";
		}
		
		function get(){
			echo "<br><br>";
			//$this指的是当前调用这个方法的对象
			echo $this->name;
			echo "<br><br>";
			echo $this->age;
			echo "<br><br>";
			echo $this->say();
			echo "<br><br>";
			//self代表我们的当前类
			//在类内部访问我们的常量
			echo self::PI;
		}
	}
	//实例话一个对象
	$stu = new Student();
	//echo "<br><br>";
	//var_dump($stu);
	//echo "<br><br>";
	//访问对象的属性
	//echo $stu->name;
	//echo "<br><br>";
		//!!!不可以在类外部访问私有或受保护的属性或方法
	//echo $stu->age;
	//访问对象的方法
	//$stu->say();
	$stu->get();
	
	//常量
	//在类外访问常量
	echo "<br><br>";
	echo Student::PI;
	
	
	//静态属性及方法
	//静态的属性和方法不需要对象来调用就可以直接用
	class Sta {
		static $name = "cx";
		static function say(){
			echo self::$name;
		}
	}
	Sta::say();
	
	
	
	/**
	 * 构造函数
	 */
	class Go {
		public $name;
		private $age;
		protected $money;
		function __construct($name,$age,$money) {
			$this->name = $name;
			$this->age = $age;
			$this->money = $money;
			//$this->info();
		}
		private function info(){
			echo "<br><br>";
			echo $this->name."今年".$this->age;
		}
		private function set(){
			$this->age -= 3;
			$this->money += 1000;
		}
		function get(){
			$this->info();
			$this->set();
			echo "<br><br>";
			echo $this->age;
			echo "<br><br>";
			echo $this->money;
		}
		//析构函数：允许销毁一个类之前
		//执行的一些操作或完成的一些功能
		function __destruct(){
			echo "<hr>";
			echo "下次见";
		}
	}
	$go = new Go("cx","20","3000");
	$go->get();
	
	
	
	/**
	 * 继承
	 */
	class Anima {
		public $name;
		private $sex;
		protected $age;
		function __construct($name,$sex,$age) {
			$this->name = $name;
			$this->sex = $sex;
			$this->age = $age;
		}
		protected function eat(){
			echo "吃吃吃";
		}
		protected function say(){
			echo "==";
		}
		function get(){
			echo "<br><br>";
			echo $this->name;
			echo "<br><br>";
			echo $this->sex;
			echo "<br><br>";
			echo $this->age;
			echo "<br><br>";
			$this->eat();
			echo "<br><br>";
			$this->say();
		}
	}
	
	/**
	 * 
	 */
	class Miao extends Anima {
		//这个类继承上面的类 
		//同时继承了它的属性和方法
		
			//当子类有构造函数的时候 就不会用父类的构造
			//函数了，
			
		public $xingge;
		function __construct($name,$sex,$age,$xingge){
				//在继承过程中，调用父类的构造函数
				//创建对应的属性
			parent::__construct($name, $sex, $age);
			//将自己独有的属性再创建
			$this->xingge = $xingge;
		}
		
		//当需要用自己的方法的时候重写方法即可 
		//称为多态
		protected function say(){
			echo "喵喵";
			echo "<br><br>";
			echo $this->xingge;
		}
	}
	
	$ani = new Anima("coco","nv","2");
	$ani->get();
	$miao = new Miao("mimi","nv","2","傲娇");
	$miao->get();
	
	//自动加载类
	//一个类作为一个php文件 通过include引入
	//!!注意命名的规范
	function __autoload($class_name){
		echo "<br><br>";
		echo "我被调用了";
		var_dump($class_name);
		include_once("$class_name"."_class.php");
	}
	$person = new Person("lck","8");
	echo "<br><br>";
	$person->info();
	$children = new Children("ck","18","999");
	echo "<br><br>";
	$children->info();
?>