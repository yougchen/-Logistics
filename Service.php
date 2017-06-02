<!DOCTYPEhtml>
<html>
<head>
<title>
	急速快遞
</title>
<body>

			<font size="100">急速快遞</font>

			<br/>

            <a href="Service.php">商品服務</a>

            <a href="Send.php">寄件</a>
   
            <a href="Recive.php">收件</a>
            
  
            <a href="Search.php">查詢</a>
  
            <a href="Account.php">帳號</a>
            
 </body>
</html>		

<?php
echo "<form action=\"PackageService.php\" method=\"post\" >";

echo "
<a href=\"PackageService.php?factor=常溫宅急便\">常溫宅急便</a><br/>
<a href=\"PackageService.php?factor=低溫宅急便\">低溫宅急便</a><br/>
<a href=\"PackageService.php?factor=經濟宅急便\">經濟宅急便</a><br/>
<a href=\"PackageService.php?factor=當日宅急便\">當日宅急便</a><br/>
<a href=\"PackageService.php?factor=到付宅急便\">到付宅急便</a><br/> ";
//<a href="">配達完通知</a>
//<a href="">配送預告</a>

//<a href="">訂單管理/取消</a>
?>

</body>	
</html>




