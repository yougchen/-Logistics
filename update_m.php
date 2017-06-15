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
mysqli_query($link,"SET NAMES 'UTF8'");
$id=$_GET["mem_id"];

$sql2="SELECT * FROM member WHERE mem_id='$id'";
$result=mysqli_query($link,$sql2);

while ($row=mysqli_fetch_assoc($result)) {
	$name=$row["mem_name"];
	$phone=$row["mem_phone"];
	$address=$row["mem_address"];
	$email=$row["mem_email"];
	$account_num=$row["mem_account_num"];
	$manager_right=$row["manager_right"];
	$birth=$row["mem_birth"];
	$career=$row["mem_career"];
	$gender=$row["mem_gender"];
}
echo "
<meta charset=\"utf-8\">
<form action='actionupdate_m.php' method='post' accept-charset=\"utf-8\">";
//echo "ID:".$id."<br/>";
echo "<input type='hidden' value='$id' name='mem_id'>";
echo "姓名:<input type='text' value='$name' name='mem_name'><br/>";
echo "電話:<input type='text' value='$phone' name='mem_phone'><br/>";
echo "地址:<input type='text' value='$address' name='mem_address'><br/>";
echo "信箱:<input type='text' value='$email' name='mem_email'><br/>";
echo "帳號:<input type='text' value='$account_num' name='mem_account'><br/>";
echo "管理權限:<input type='text' value='$manager_right' name='manager_right'><br/>";
echo "生日:<input type='text' value='$birth' name='mem_birth'><br/>";
echo "職業:<input type='text' value='$career' name='mem_career'><br/>";
echo "性別:<input type='text' value='$gender' name='mem_gender'><br/>";
echo "<input type='submit' neme = 'submit' value='修改'>";
echo "</form>";

	}
}


?>
<h2/>
<html/>
