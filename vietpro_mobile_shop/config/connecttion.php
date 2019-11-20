<?php
	if(!defined('SECURITYAD')){
		die('Chỉ cho phép quản trị viên truy cập');
	}
    $conn = mysqli_connect('localhost', 'root', '', 'vietpro_dts');
    if($conn){
        mysqli_query($conn, "SET NAMES 'utf8'");
    }
    else{
        die("connect fail");
    }
?>