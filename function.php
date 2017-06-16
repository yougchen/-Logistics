<!DOCTYPE html>
<html>
<head>
    <title>急速運送</title>
    <link rel="stylesheet" href="normal.css">

</head>

    <body>
    <h1>急速快遞</h1> <br/>
    <div class="menu">
            <a href="Service.php">商品服務</a>

            <a href="send.php">寄件</a>
   
            <a href="recive.php">收件</a>

            <a href="search.php">查詢</a>
  
            <a href="account.php">帳號</a>

            <a href="index.php">首頁</a>

            <?php session_start(); ?>
            <?php if (empty($_SESSION["loginsession"])) { ?>
            <?php } else { ?>
            <a href="logout.php">登出</a>
            <?php } ?>

    </div>


<?php

include("config.php");
if (empty($_SESSION["loginsession"])) {
	echo "請先登入會員!!!";
	header("refresh:3;url = login.php");
} else{ ?>
<h2>
    <a href = "list.php">個人資料</a>
    <br/>
    <a href = "order.php">個人寄件訂單</a>
<?php }?>
</h2>
