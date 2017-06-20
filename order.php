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
	<div class = "table">
<?php

mysqli_query($link,"SET NAMES 'UTF8'");

$mem_account_num=$_SESSION["loginsession"];
//尋找mem_id
$sql2="SELECT mem_id FROM member WHERE mem_account_num ='$mem_account_num'";
$query2=mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($query2);
$mem_id=$row2["mem_id"];
  
$result = mysqli_query($link, "SELECT * FROM invoice where mem_id = '$mem_id'");

        echo "<table border=1>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>編號</th>";
        echo "<th>收件人名字</th>";
        echo "<th>收件人手機</th>";
        echo "<th>收件人信箱</th>";
        echo "<th>收件時間</th>";
        echo "<th>收件地址</th>";
        echo "<th>寄件時間</th>";
        echo "<th>金額</th>";
        echo "<th>送達</th>";
        echo "<th>寄件人編號</th>";
        echo "</tr>";
        echo "</thead>";
        while($row = mysqli_fetch_assoc($result)){
          echo "<tr>";
          echo "<td>";
          $id = $row["inv_id"];
          echo "<a href = 'search_by_invoice.php?inv_id=$id'>".$row["inv_id"]."</a>";
          echo "</td><td>";
          echo $row["receiver_name"];
          echo "</td><td>";
          echo $row["receiver_phone"];
          echo "</td><td>";
          echo $row["receiver_email"];
          echo "</td><td>";
          echo $row["arrive_time"];
          echo "</td><td>";
          echo $row["arrive_address"];
          echo "</td><td>";
          echo $row["send_time"];
          echo "</td><td>";
          echo $row["total_price"];
            if($row["if_success"]<1)
			{
				echo "<td>未送達</td>";
			}
			else
			{
				echo "<td>送達</td>";
			}
          echo "</td><td>";
          echo $row["mem_id"];
          echo "</td>";
          echo "</tr>";
        }
        echo "</table>";

        mysqli_close($link);
} 

?>
	</div>
</body>
</html>