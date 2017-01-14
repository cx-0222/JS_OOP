<?php
	/**
	 * 
	 */
	class Person {
		//protected和private两个修饰符
		//都只能在类内使用而无法在类外使用的
		//但是private不能通过继承给我们的子类使用我们的属性
		//但是protected是可以的将我们是属性继承给我们的子类 让子类在类内进行使用
		protected $name;
		private $age;
		public $gender = "man";
		
		function __construct($name,$age) {
			$this->name = $name;
			$this->age = $age;
		}
		//多态
		protected function hello(){
			echo "hello";
		}
		
		function info(){
			$this->hello();
			echo $this->name.$this->gender;
		}
	}
	
	/**
	 * 
	 */
	class Children extends Person {
		public $money;
		//当子类有构造函数的时候 就不会用父类的构造函数了
		//在继承当中，如果我们的子类有自己的构造函数就需要通过
		//parent::__construct()通过传参数来让父类调用他的构造函数帮我们创建对应的属性
		//而自己独有的属性就在子类自身的构造函数中去设置
		function __construct($name,$age,$money) {
			parent::__construct($name,$age);
			$this->money = $money;
			$this->hello();
		}
		
		function hello(){
			echo "lanou";
		}
		//function info(){
			//echo $this->name.$this->gender;
		//}
	}
	
	$person = new Person("lck","8");
	$person->info();
	//var_dump($person);
	$children = new Children("ck","18","999");
	//var_dump($children);
	echo "<br><br>";
	$children->info();
?>