<!--加入會員-->
<!DOCTYPE html>
<html>
<head>
    <title>急速運送</title>
    <link rel="stylesheet" href="normal.css">


</head>

    <body>
 <h1>急速快遞</h1> <br/>
<?php
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

            <a href="index.php">首頁</a>

    </div>
<?php
	echo "<br/><br/><h2>請先登入會員!!!</h2>";
	header("refresh:3;url = login.php");
} else {?>
		<div class = "menu">
            <a href="Service.php">商品服務</a>

            <a href="send.php">寄件</a>
   
            <a href="recive.php">收件</a>

            <a href="search.php">查詢</a>
  
            <a href="account.php">帳號</a>

            <a href="index.php">首頁</a>


            <a href="logout.php">登出</a>
        </div>
<div class = "table_account">
<?php
		
mysqli_query($link,"SET NAMES 'UTF8'");




$mem_id=$_POST["mem_id"];
$mem_name=$_POST["mem_name"];
$mem_phone=$_POST["mem_phone"];
$mem_address=$_POST["mem_address"];
$mem_email=$_POST["mem_email"];
$mem_account_num=$_POST["mem_account"];
$mem_birth=$_POST["mem_birth"];
$mem_career=$_POST["mem_career"];
$mem_gender=$_POST["mem_gender"];

$sql2="UPDATE member SET mem_name='$mem_name',mem_phone='$mem_phone',mem_address='$mem_address',mem_email='$mem_email',mem_account_num='$mem_account_num',mem_birth='$mem_birth',mem_career='$mem_career',mem_gender='$mem_gender' WHERE mem_id='$mem_id'";

$result=mysqli_query($link,$sql2);
$result=mysqli_query($link,"SELECT*FROM member WHERE mem_id='$mem_id'");
echo "<table border=1>";
echo "<thead>";
        echo "<tr>";
        echo "<th>姓名</th>";
        echo "<th>電話</th>";
        echo "<th>地址</th>";
        echo "<th>信箱</th>";
        echo "<th>帳號</th>";
        echo "<th>密碼</th>";
        echo "<th>生日</th>";
        echo "<th>職業</th>";
        echo "<th>性別</th>";
        echo "</tr>";
        echo "</thead>";
while($row=mysqli_fetch_assoc($result)){
	echo "<tr>";
        	echo "<td>";
	        echo $row["mem_name"];
        	$id = $row["mem_id"];
        	echo "</td><td>";
        	echo $row["mem_phone"];
        	echo "</td><td>";
        	echo $row["mem_address"];
            echo "</td><td>";
        	echo $row["mem_email"];
            echo "</td><td>";
        	echo $row["mem_account_num"];
            echo "</td><td>";
        	echo $row["mem_password"];
            echo "</td><td>";
        	echo $row["mem_birth"];
            echo "</td><td>";
        	echo $row["mem_career"];
            echo "</td><td>";
        	echo $row["mem_gender"];
        	echo "</td>";
	echo "</tr>";
}
echo "</table>";

        	echo "<h4><br /><a href = 'update.php?mem_id=$id'>修改個人資料</a>";
        	echo "<a href = 'pwd_edit.php?mem_id=$id'>變更密碼</a><br /></h4></div>";

        	echo "<div class = 'table_account_delete'><br /><h4>是否要刪除帳戶？<a href = 'delete.php?mem_id=$id'>刪除</a>";

        echo "<br /><br /><a href = 'logout.php'>登出</a> </h4>";
}
?>
</div>
<html/>
