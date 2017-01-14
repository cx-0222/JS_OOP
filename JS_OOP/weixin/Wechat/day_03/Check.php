<?php
    //自动加载类函数
    header('content-type:text/html;charset=utf-8');
    function __autoload($class){ 
        $file="$class.class.php"; 
    //判断是否是一个文件
        if(is_file($file)){
            include_once $file;         
        }
    } 
    //创建对象
    $chptcha=new Chptcha(); 
    //调用方法
    $chptcha->generate();