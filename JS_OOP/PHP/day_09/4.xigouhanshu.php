<?php
	/**
	 * 
	 */
	class Tearcher {
		public $name;
		private $age;
		protected $money;
		function __construct($name,$age,$money) {
			$this->name = $name;
			$this->age = $age;
			$this->info();
			$this->ages();
			$this->money = $money;
		}
		private function info(){
			echo $this->name."今年".$this->age -= 3;
		}
		private function ages(){
			$this->age -= 3;
		}
		function getMoney(){
			return $this->money;
		}
		function setMoney($money){
			$this->money += $money;
			//echo $this->money;
		}
		
		
		//析构函数
		function __destruct(){
			echo "<hr>";
			echo "下次见";
		}
	}
	$tea = new Tearcher("cx","20",'3000');
	//var_dump($tea);
	echo $tea->getMoney();
	$tea->setMoney(0.0001);
	echo $tea->getMoney();
?>