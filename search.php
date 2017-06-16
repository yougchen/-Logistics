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

</html>
<html>
<head>
	<title>查詢</title>
</head>
		<body>
			<div class = "search">
			<h4>請問你要查詢哪個包裹？</h4>
				<form action="packagesearch.php" method="post">
					<input type="text" name="inv_id">請輸入訂單編號<br>

					<input type="submit" value="送出">	
				</form>
			</div>
		</body>

</html>

