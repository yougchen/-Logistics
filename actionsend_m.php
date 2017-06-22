<!--加入會員-->
<!DOCTYPE html>
<html>
<head>
    <title>急速運送</title>
    <link rel="stylesheet" href="manager.css">


</head>

    <body>
    <h1>急速快遞</h1> <br/><?php
header('Content-Type: text/html; charset=utf-8');
include("config.php");
session_start();
//判斷是否已登入
if (empty($_SESSION["loginsession"])) { ?>
	<div class = "menu">
            <a href="Service.php">商品服務</a>

            <a href="send.php">寄件</a>
   
            <a href="recive.php">收件</a>

            <a href="search.php">查詢</a>
  
            <a href="account.php">帳號</a>
    </div>
<?php
	echo "<br/><br/><h2>請先登入會員!!!</h2>";
	header("refresh:3;url = login.php");
} else {
$account = $_SESSION["loginsession"];

//判斷是否為管理者
$sql = "SELECT manager_right FROM member WHERE mem_account_num = '$account'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
	   if($row["manager_right"] == 0) { ?>
	   <div class = "menu">
            <a href="Service.php">商品服務</a>

            <a href="send.php">寄件</a>
   
            <a href="recive.php">收件</a>

            <a href="search.php">查詢</a>
  
            <a href="account.php">帳號</a>

            <a href="logout.php">登出</a>
       </div>
<?php
	echo "<br/><br/><h2>權限不夠!!!</h2>";
	header("refresh:3;url = index.php");

	}
	else{?>
	<div class = "menu">
        <a href = "invoice_list.php">訂單管理</a>
   
        <a href = "package_list.php">包裹管理</a>
  
        <a href = "list_m.php">會員管理</a>
        
        <a href = "analysis_m.php">資料分析</a>

        <a href="index.php">首頁</a>

         <a href="logout.php">登出</a>         
    </div>
<?php


if(isset($_POST["number"])){

	mysqli_query($link,"SET NAMES 'UTF8'");
	$delivery_method = $_POST["delivery_method"];
	$inv_id = $_POST["inv_id"];
	$number = $_POST["number"];
	//運費對應，使用package_price_count.php要有的模板
	//常溫
	$price = array("60" => "130", "90" => "170", "120" => "210", "150" => "250");
	$K = array_keys($price);
	//低溫
	$price_cold = array("60" => "160", "90" => "225", "120" => "290");
	$K_cold = array_keys($price_cold);
	//經濟
	$price_cheap = array("5000" => "95");
	$K_cheap = array_keys($price_cheap);

	for($n = 1;$n <= $number;$n++){
		$packagename = "PackageType".$n;
		$package_type = $_POST[$packagename];
		$length = $_POST["length"];
		$width = $_POST["width"];
		$height = $_POST["height"];
		$weight = $_POST["weight"];

		$array_num=$n-1;
	include("package_price_count.php");


	  $sql = "INSERT INTO package (pac_id,pac_type, pac_length, pac_width, pac_height, pac_weight, pac_delivery_method,pac_price,inv_id) 
	  VALUES ('$n','".$package_type."', '".$length[$array_num]."', '".$width[$array_num]."', '".$height[$array_num]."', '".$weight[$array_num]."', '$delivery_method','$pac_price','$inv_id')";



	  $result = mysqli_query($link,$sql) or die("MySQL insert error".mysqli_error($link));

	}
	//update total_price
		$sql2 = "SELECT SUM(pac_price) as total_price FROM package WHERE package.inv_id = '$inv_id' ";
		$result = mysqli_query($link,$sql2) or die("my sql select error");
		$row=mysqli_fetch_assoc($result);
		$total_price = $row["total_price"];

		$sql3="UPDATE invoice SET total_price='$total_price' WHERE inv_id='$inv_id'";
		$result=mysqli_query($link,$sql3) or die("mysql update error");
		
	  header("location:invoice_list.php");
}
else {

	mysqli_query($link,"SET NAMES 'UTF8'");

	$delivery_method = $_POST["delivery_method"];
	$inv_id = $_POST["inv_id"];
	//判斷inv_id是否已有
	if(isset($_POST["inv_id"]) && $_POST["inv_id"] != ""){
		$inv_id = $_POST["inv_id"];
		$sql = "SELECT * FROM invoice WHERE inv_id = '$inv_id'";
		$result = mysqli_query($link, $sql);
		$total_records = mysqli_num_rows($result);
		//有資料
		if ($total_records == 0) {
			header("refresh:3;url=invoice_list.php");
			echo "<br />訂單編號不存在，請先新增訂單";
			exit();
		}
	}

	//判斷pac_id是否已有
	if(isset($_POST["pac_id"]) && $_POST["pac_id"] != ""){
		$pac_id = $_POST["pac_id"];
		$sql = "SELECT count(*) FROM package WHERE inv_id = '$inv_id' and pac_id = '$pac_id'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);
		$total_records = $row["count(*)"];
		//有資料
		if ($total_records > 0) {
			header("refresh:3;url=package_list.php");
			echo "<br />包裹編號已有";
			exit();
		}
	}
	else{
	//inv內pac_id最大的
		$result = mysqli_query($link,"SELECT pac_id from package where inv_id = '$inv_id' order by pac_id desc LIMIT 1");
		$row = mysqli_fetch_assoc($result);
		$pac_id = $row["pac_id"]+1;
		echo $pac_id;
	}

	$n = 1;
	//運費對應，使用package_price_count.php要有的模板
	//常溫
	$price = array("60" => "130", "90" => "170", "120" => "210", "150" => "250");
	$K = array_keys($price);
	//低溫
	$price_cold = array("60" => "160", "90" => "225", "120" => "290");
	$K_cold = array_keys($price_cold);
	//經濟
	$price_cheap = array("5000" => "95");
	$K_cheap = array_keys($price_cheap);

	$packagename = "PackageType".$n;
	$package_type = $_POST[$packagename];
	$length = $_POST["length"];
	$width = $_POST["width"];
	$height = $_POST["height"];
	$weight = $_POST["weight"];
	$array_num=$n-1;
	include("package_price_count.php");


	  $sql = "INSERT INTO package (pac_id,pac_type, pac_length, pac_width, pac_height, pac_weight, pac_delivery_method,pac_price,inv_id) 
	  VALUES ('$pac_id','".$package_type."', '".$length[$array_num]."', '".$width[$array_num]."', '".$height[$array_num]."', '".$weight[$array_num]."', '$delivery_method','$pac_price','$inv_id')";



	  $result = mysqli_query($link,$sql) or die("MySQL insert error".mysqli_error($link));
	  //update total_price
		$sql2 = "SELECT SUM(pac_price) as total_price FROM package WHERE package.inv_id = '$inv_id' ";
		$result = mysqli_query($link,$sql2) or die("my sql select error");
		$row=mysqli_fetch_assoc($result);
		$total_price = $row["total_price"];

		$sql3="UPDATE invoice SET total_price='$total_price' WHERE inv_id='$inv_id'";
		$result=mysqli_query($link,$sql3) or die("mysql update error");
	  header("location:package_list.php");
}
	}
}
?>