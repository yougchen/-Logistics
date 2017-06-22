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

            <a href="logout.php">登出</a>
        </div>

<?php
if(isset($_POST["number"]))
{

	date_default_timezone_set("Asia/Taipei");


	$number = $_POST["number"];
	$rsend_time=time();
	$rname = $_POST["rname"];
	$rphone = $_POST["rphone"];
	$remail = $_POST["remail"];
	$raddress = $_POST["raddress"];
	$pac_delivery_method = $_POST["delivery_method"];
	
	


    echo "<form action = \"actionsend.php\" method = \"POST\" accept-charset=\"utf-8\">";
    echo "<input type='hidden' name='pac_delivery_method' value='".$pac_delivery_method."'>"."<br>";

    echo "<input type='hidden' name='number' value='".$number."'>"."<br>";

    echo "<input type='hidden' name='rname' value='".$rname."'>"."<br>";

    echo "<input type='hidden' name='rphone' value='".$rphone."'>"."<br>";
    
    echo "<input type='hidden' name='remail' value='".$remail."'>"."<br>";

    echo "<input type='hidden' name='raddress' value='".$raddress."'>"."<br>";
     //送出時間: 
    echo "<input type=\"hidden\" name=\"rsend_time\" value=\"$rsend_time\"><br>";

    for($n = 1;$n <= $number;$n++){
    	
    	echo "
    		包裹資料 <br>";
    		
    	echo "包裹類型:
    				<input type=\"radio\" name=\"PackageType".$n."\" value=\"一般常溫用品\" checked = \"True\">一般常溫用品
    				<input type=\"radio\" name=\"PackageType".$n."\" value=\"低溫保鮮品\">低溫保鮮品
    				<input type=\"radio\" name=\"PackageType".$n."\" value=\"冷凍保鮮品\">冷凍保鮮品
    				<input type=\"radio\" name=\"PackageType".$n."\" value=\"易碎品\">易碎品<br>
    		包裹長度:<input type=\"text\" name=\"length[]\" value=\"\" required pattern = '^[1-9{1}][0-9]*' maxlength = 11>(單位:公分)<br>
    		包裹寬度:<input type=\"text\" name=\"width[]\" value=\"\" required pattern = '^[1-9{1}][0-9]*' maxlength = 11>(單位:公分)<br>
    		包裹高度:<input type=\"text\" name=\"height[]\" value=\"\" required pattern = '^[1-9{1}][0-9]*' maxlength = 11>(單位:公分)<br>
    		包裹重量:<input type=\"text\" name=\"weight[]\" value=\"\" required pattern = '^[1-9{1}][0-9]*' maxlength = 11>(單位:公克)<br>";
    	

    }

    
    echo "<input type=\"submit\" name=\"submit\" value=\"submit\">";
    echo "</form>";
}
}

    ?>