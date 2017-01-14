<?php
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
?>