<?php
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
?>