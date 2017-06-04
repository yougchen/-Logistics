<?php

$link=mysqli_connect(
	'localhost',//myaql主機名
	'root',//使用者名
	'',//密碼
	'logintest');//使用者資料庫名

	if($link){
		echo"DB Connected";
	}
	else{
		echo"DB Connection Failed";
	}
?>