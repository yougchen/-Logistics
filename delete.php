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
<h2>
<?php
		
mysqli_query($link,"SET NAMES 'UTF8'");
//$account = $_SESSION["login)session"];
$id=$_GET["mem_id"];

$sql2="DELETE FROM member WHERE mem_id='$id'";
//$sql = "SELECT * FROM member WhERE mem_account_num = '".$account."'";
$result=mysqli_query($link,$sql2);
echo "帳號刪除成功!!!";
session_unset("$_SESSION[loginsession]");
header("refresh:3;url = index.php");
// $result=mysqli_query($link,"SELECT * FROM member");
// $result2 = mysqli_query($link, $sql);
// echo "<table border=1>";
// echo "<thead>";
//         echo "<tr>";
//         echo "<th>姓名</th>";
//         echo "<th>電話</th>";
//         echo "<th>地址</th>";
//         echo "<th>信箱</th>";
//         echo "<th>帳號</th>";
//         echo "<th>密碼</th>";
//         echo "<th>生日</th>";
//         echo "<th>職業</th>";
//         echo "<th>性別</th>";
//         echo "<th>刪除</th>";
//         echo "<th>修改</th>";
//         echo "<th>密碼修改</th>";
//         echo "</tr>";
//         echo "</thead>";
// while($row=mysqli_fetch_assoc($result2)){
// 	echo "<tr>";
//         	echo "<td>";
// 	        echo $row["mem_name"];
//         	$id = $row["mem_id"];
//         	echo "</td><td>";
//         	echo $row["mem_phone"];
//         	echo "</td><td>";
//         	echo $row["mem_address"];
//             echo "</td><td>";
//         	echo $row["mem_email"];
//             echo "</td><td>";
//         	echo $row["mem_account_num"];
//             echo "</td><td>";
//         	echo $row["mem_password"];
//             echo "</td><td>";
//         	echo $row["mem_birth"];
//             echo "</td><td>";
//         	echo $row["mem_career"];
//             echo "</td><td>";
//         	echo $row["mem_gender"];
// 	echo "</td>";
// 	echo "<td>";
// 	echo "<a href='delete.php?mem_id=$id'>刪除</a>";
// 	echo "</td>";
// 	echo "<td>";
// 	echo "<a href='update.php?mem_id=$id'>資料修改</a>";
// 	echo "</td>";
// 	echo "<td>";
//         	echo "<a href = 'pwd_edit.php?mem_id=$id'>密碼修改</a>";
//         	echo "</td>";
// 	echo "</tr>";
// }
// echo "</table>";
// echo "<a href = 'logout.php'>登出</a>";

// mysqli_close($link);
}
?>
</h2>
</body>
</html>