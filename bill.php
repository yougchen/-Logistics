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
    <body>
    <div class = "table">
    <?php mysqli_query($link,"SET NAMES 'UTF8'"); ?>
    <?php $inv_id=$_GET["inv_id"]; ?>
    <?php //echo $inv_id; ?>
    <?php $sql="SELECT * FROM invoice WHERE inv_id='$inv_id'" ?>
    <?php $result=mysqli_query($link,$sql); ?>
    <?php while ($row=mysqli_fetch_assoc($result)) { ?> 
    <?php $rname = $row["receiver_name"]; ?>
    <?php $rphone = $row["receiver_phone"]; ?>
    <?php $remail = $row["receiver_email"]; ?>
    <?php $arrive_time = $row["arrive_time"]; ?>
    <?php $arrive_address = $row["arrive_address"]; ?>
    <?php $send_time = $row["send_time"]; ?>
    <?php $total_price = $row["total_price"]; ?>
    <?php $mem_id = $row["mem_id"]; ?>
    <?php } ?>
    <?php //echo $rname; ?>
    <?php $sql2 = "SELECT * FROM member, invoice WHERE invoice.mem_id=member.mem_id AND invoice.inv_id='$inv_id'"; ?>
    <?php $result2 = mysqli_query($link, $sql2); ?>
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
    <?php $mem_name = $row["mem_name"]; ?>
    <?php } ?>

    <table border = 1>
        <tr><td>訂單編號</td><td><?php echo $inv_id ?></td></tr>
        <tr><td>收信人:</td><td><?php echo $rname; ?></td></tr>
        <tr><td>手機:</td><td><?php echo $rphone ?></td></tr>
        <tr><td>信箱:</td><td><?php echo $remail ?></td></tr>
        <tr><td>寄出時間:</td><td><?php echo $send_time ?></td></tr>
        <tr><td>送達時間:</td><td><?php echo $arrive_time ?></td></tr>
        <tr><td>送達地址:</td><td><?php echo $arrive_address ?></td></tr>
        <tr><td>應收金額:</td><td><?php echo $total_price ?></td></tr>
        <tr><td>寄出人:</td><td><?php echo $mem_name; }?></td></tr>
        

    </table>
    <a href = "index.php">回到首頁</a>
    </div>
    </body>
</html>