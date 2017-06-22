
<!--加入會員-->
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
    </div>

<h4>
<?php
ob_start();
session_start();
include("config.php");


$account = $_POST["account"];
$password = $_POST["password"];

$sql = "SELECT * FROM member WHERE mem_account_num = '".$account."' AND mem_password = '".$password."'";
$result = mysqli_query($link, $sql);
$total_records = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
if ($total_records > 0) {
    if($row["manager_right"] == 0) {
       $_SESSION["loginsession"] = $account;
       session_write_close();
       header("Location:function.php");die();
        ob_end_flush(); 
    } else {
        $_SESSION["loginsession"] = $account;
        session_write_close();
        header("Location:manager.php");die();
         ob_end_flush(); 
    }
} else {
    header("refresh:3;url=login.php");
    ob_end_flush();    
    echo "登入失敗!!!";
}
?>
<h4/>
<html/>

