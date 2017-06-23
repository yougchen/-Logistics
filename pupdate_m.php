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

    <div class = "package">
<?php

		
mysqli_query($link,"SET NAMES 'UTF8'");
$id=$_GET["pac_id"];
$inv_id = $_GET["inv_id"];

$sql2="SELECT * FROM package WHERE pac_id='$id' and inv_id='$inv_id'";
$result=mysqli_query($link,$sql2);

while ($row=mysqli_fetch_assoc($result)) {

	//pac_id可能會被改
	$pac_id1=$row["pac_id"];
	$pac_type=$row["pac_type"];
	$pac_length=$row["pac_length"];
	$pac_width=$row["pac_width"];
	$pac_height=$row["pac_height"];
	$pac_weight=$row["pac_weight"];
	$pac_delivery_method=$row["pac_delivery_method"];
	$pac_price=$row["pac_price"];
	$inv_id=$row["inv_id"];
}

echo "<meta charset=\"utf-8\">";
if(isset($_GET["factor"])&&$_GET["factor"]=="invoice")
{
	echo "<form action='search_by_invoice.php?inv_id=$inv_id' method='post' accept-charset=\"utf-8\">";
}
else
{
	echo "<form action='actionpupdate_m.php' method='post' accept-charset=\"utf-8\">";
//echo "ID:".$id."<br/>";
}

echo "<input type='hidden' name='pac_id1' value='".$pac_id1."'>"."<br>";
echo "<input type='hidden' name='inv_id' value='".$inv_id."'>"."<br>";

echo "包裹編號:<input type='text' value='$pac_id1' name='pac_id'><br/>";
echo "包裹品項:<input type='text' value='$pac_type' name='pac_type'><br/>";
echo "包裹長度:<input type='text' value='$pac_length' name='pac_length'><br/>";
echo "包裹寬度:<input type='text' value='$pac_width' name='pac_width'><br/>";
echo "包裹高度:<input type='text' value='$pac_height' name='pac_height'><br/>";
echo "包裹重量:<input type='text' value='$pac_weight' name='pac_weight'><br/>";
echo "寄件方式:<input type='text' value='$pac_delivery_method' name='pac_delivery_method'><br/>";
echo "金額:<input type='text' value='$pac_price' name='pac_price'><br/>";
echo "訂單編號:".$inv_id."(不可修改)";
echo "<input type='submit' neme = 'submit' value='修改'>";
echo "</form>";
	}
}




?>

</div>
</body>
</html>