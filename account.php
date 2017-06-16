 <!--賬號管理-->
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


		</div>
	
		<div class="joinORloginin">
			<h2>
		<?php session_start(); ?>
		<?php include("config.php"); ?>
		
		<?php if (empty($_SESSION["loginsession"])) { ?>
			<a href="join.php">加入會員</a>
 			<a href="login.php">登入會員</a>
		
		

		<?php } else {?>
			<?php $sql = "SELECT * FROM member WHERE mem_account_num = '".$_SESSION['loginsession']."'"; ?>
			<?php $result = mysqli_query($link, $sql); ?>
			<?php $total_records = mysqli_num_rows($result); ?>
			<?php $row = mysqli_fetch_assoc($result); ?>
					<?php if ($row["manager_right"] == 0) { ?>
			<?php header("location:function.php"); ?>
		<?php } else {?>
			<?php header("location:manager.php"); ?>
		<?php } ?>
		<?php } ?>
			</h2>
		 </div>

		</body>

</html>