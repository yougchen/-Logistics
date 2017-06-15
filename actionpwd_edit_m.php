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
	
    $id = $_POST["mem_id"];
    $OldPassword=$_POST["OldPassword"];
    $NewPassword=$_POST["NewPassword"];
    $NewPassword2=$_POST["NewPassword2"];

    
    $sql = "SELECT * FROM member WHERE mem_id = '".$id."' AND mem_password = '".$OldPassword."'";
    $result = mysqli_query($link, $sql);
    $total_records = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($total_records > 0) {
        if ($NewPassword == $NewPassword2) {
            $sql2="UPDATE member SET mem_password ='".$NewPassword."' WHERE mem_id ='".$id."'";
            $result2=mysqli_query($link,$sql2);
            $result2=mysqli_query($link,"SELECT*FROM member");
            echo "<h2>密碼更改成功 回到會員管理</h2>";
            header("refresh:3;url = list_m.php");
        }
        else {
            echo "<h2>新密碼不同!!!</h2>";
            header("refresh:3;url = list_m.php");
        }
    }
    else {
        echo "<h2>舊密碼錯誤!!!</h2>";
        header("refresh:3;url = list_m.php");
    }
	}
}
?>
</div>
</body>
</html>
