<?php
	class chkinput {            //定义chkinput类
    var $name;                //定义成员变量
    var $pwd;                //定义成员变量
    function chkinput($x, $y) {        //定义成员方法
        $this->name = $x;        //为成员变量赋值
        $this->pwd = $y;        //为成员变量赋值
    }
    function checkinput() {            //定义方法，完成用户注册
        include "conn/conn.php";    //通过include调用数据库连接文件
        $info = mysql_query ( "insert into tb_user(user,password)value('" . $this->name . "','" . $this->pwd . "')" );
        if ($info == false) {        //根据添加操作的返回结果，给出提示信息
            echo "<script language='javascript'>alert('会员注册失败！');history.back();</script>";
            exit ();
        } else {
            $_SESSION [admin_name] = $this->name;        //注册成功后，将用户名赋给SESSION变量
            echo "<script language='javascript'>alert('恭喜您，注册成功！');window.location.href='index.php';</script>";
        }
    }
}
$obj = new chkinput ( trim ( $_POST [name] ), trim ( md5 ( $_POST [pwd] ) ) );        //实例化类
$obj->checkinput ();    //根据返回对象调用方法执行注册操作
?>
