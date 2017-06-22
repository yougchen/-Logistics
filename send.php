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
    <form action = "packagesend.php" method = "POST" accept-charset=\"utf-8\">
    寄件資料 <br>

    運送方式:<input type="radio" name="delivery_method" value="一般寄件" checked = \"True\">一般寄件
            <input type="radio" name="delivery_method" value="急件" >急件 <br>


    收件人姓名:<input type="text" name="rname" value=""><br>
    收件人電話:<input type="tel" name="rphone"  required placeholder="09xxxxxxxx" pattern="^0[0-9]{8,}" maxlength="10"><br>
    收件人信箱:<input type='email' name='remail' required placeholder='example@mail.com' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$'><br>

    收件人地址:<input type="text" name="raddress" value="" required maxlength='35'><br>
    
    請選擇你要選幾個包裹(<=20)<br/>

			<select name="number" >
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>


			</select>


    
    <input type="submit" name="submit" value="送出">
    </form>
<?php } ?>
    </h2>
	</body>
</html>