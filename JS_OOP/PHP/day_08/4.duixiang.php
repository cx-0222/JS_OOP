<?php
	/**
	 * 
	 */
	class Person {
		public $name;
		public $pass;
		private $age;
	}
	$person = new Person();
	//设置值
	$person->name = "cx";
	//取值
	//$person->name
	var_dump($person);
	//私有不可以这样设置
	//$person->age = 99;
?>