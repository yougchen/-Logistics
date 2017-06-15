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

    <div class = "account">
<?php


$id = $_GET["mem_id"];

$sql = "SELECT * FROM member WHERE mem_id = '". $id ."'";
$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $name = $row["mem_name"];
    $account_num = $row["mem_account_num"];
    $password = $row["mem_password"];
}

echo "<form action = 'actionpwd_edit_m.php' method = 'post'>";
echo "<input type = 'hidden' value = '$id' name = 'mem_id'>";
echo "姓名:" . $name . "<br/>";
echo "舊密碼:<input type = 'text' name = 'OldPassword'>請輸入舊密碼<br/>";
echo "新密碼:<input type = 'text' name = 'NewPassword'>請輸入新密碼<br/>";
echo "確認密碼:<input type = 'text' name = 'NewPassword2'>請再一次輸入新密碼<br/>";
echo "<input type = 'submit' name = 'submit'>";
	}
}
?>
</div>
</body>
</html>