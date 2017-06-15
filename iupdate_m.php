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
<h2>
<?php
		
mysqli_query($link,"SET NAMES 'UTF8'");
$id=$_GET["inv_id"];

$sql2="SELECT * FROM invoice WHERE inv_id='$id'";
$result=mysqli_query($link,$sql2);

while ($row=mysqli_fetch_assoc($result)) {
	$inv_id=$row["inv_id"];
	$receiver_name=$row["receiver_name"];
	$receiver_phone=$row["receiver_phone"];
	$receiver_email=$row["receiver_email"];
	$arrive_time=$row["arrive_time"];
	$arrive_address=$row["arrive_address"];
	$send_time=$row["send_time"];
	$total_price=$row["total_price"];
	$if_success=$row["if_success"];
	$mem_id=$row["mem_id"];
}
echo "
<meta charset=\"utf-8\">
<form action='actioniupdate_m.php' method='post' accept-charset=\"utf-8\">";
//echo "ID:".$id."<br/>";

echo "編號:<input type='text' value='$inv_id' name='inv_id'><br/>";
echo "收件人名字:<input type='text' value='$receiver_name' name='receiver_name'><br/>";
echo "收件人手機:<input type='text' value='$receiver_phone' name='receiver_phone'><br/>";
echo "收件人信箱:<input type='text' value='$receiver_email' name='receiver_email'><br/>";
echo "收件時間:<input type='text' value='$arrive_time' name='arrive_time'><br/>";
echo "收件地址:<input type='text' value='$arrive_address' name='arrive_address'><br/>";
echo "寄件時間:<input type='text' value='$send_time' name='send_time'><br/>";
echo "金額:<input type='text' value='$total_price' name='total_price'><br/>";
echo "送達:<input type='text' value='$if_success' name='if_success'><br/>";
echo "寄件人編號<input type='text' value='$mem_id' name='mem_id'>";
echo "<input type='submit' neme = 'submit' value='修改'>";
echo "</form>";

	}
}



?>
</h2>
</body>
</html>
