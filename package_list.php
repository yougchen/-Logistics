<!--加入會員-->
<!DOCTYPE html>
<html>
<head>
    <title>急速運送</title>
    <link rel="stylesheet" href="manager.css">

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

    <div class = "ptable">
	<h2>
	    <a href = "packagesend_m.php">包裹新增</a>
	</h2>
	</div>

    <div class = "package">
        <?php

   		header('Content-Type: text/html; charset=utf-8');
   		
        include("config.php");
		
		mysqli_query($link,"SET NAMES 'UTF8'");
        
        $result = mysqli_query($link, "SELECT * FROM package order by inv_id, pac_id");
        echo "<table border=1>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>包裹編號</th>";
        echo "<th>包裹品項</th>";
        echo "<th>包裹長度</th>";
        echo "<th>包裹寬度</th>";
        echo "<th>包裹高度</th>";
        echo "<th>包裹重量</th>";
        echo "<th>寄件方式</th>";
        echo "<th>金額</th>";
        echo "<th>訂單編號</th>";
        echo "<th>刪除</th>";
        echo "<th>資料修改</th>";
        echo "</tr>";
        echo "</thead>";
        while($row = mysqli_fetch_assoc($result)){
	        echo "<tr>";
        	echo "<td>";
	        echo $row["pac_id"];
	        $id = $row["pac_id"];
        	echo "</td><td>";
        	echo $row["pac_type"];
        	echo "</td><td>";
        	echo $row["pac_length"];
        	echo "</td><td>";
        	echo $row["pac_width"];
            echo "</td><td>";
        	echo $row["pac_height"];
            echo "</td><td>";
        	echo $row["pac_weight"];
            echo "</td><td>";
        	echo $row["pac_delivery_method"];
            echo "</td><td>";
        	echo $row["pac_price"];
            echo "</td><td>";
        	echo $row["inv_id"];
        	$inv_id=$row["inv_id"];
        	echo "</td>";
        	echo "<td>";
        	echo "<a href = 'pdelete_m.php?pac_id=$id&inv_id=$inv_id'>delete</a>";
        	echo "</td>";
        	echo "<td>";
        	echo "<a href = 'pupdate_m.php?pac_id=$id&inv_id=$inv_id'>modify</a>";
        	echo "</td>";
        	echo "</tr>";
        }
        echo "</table>";

        mysqli_close($link);
    }
}   	   ?>
	</div>
    </body>
</html>