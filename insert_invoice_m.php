<!--加入會員-->
<!DOCTYPE html>
<html>
<head>
    <title>急速運送</title>
    <link rel="stylesheet" href="manager.css">


</head>

    <body>
    <h1>急速快遞</h1> <br/><?php
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
   	<h2>
    <form action = "packagesend_m.php" method = "POST" accept-charset=\"utf-8\">
    寄件資料 <br>

	編號:<input type="text" name="inv_id">(不寫系統將會自動找編號)<br/>


    收件人姓名:<input type="text" name="rname" value="" required><br>
    收件人電話:<input type="tel" name="rphone"  required placeholder="09xxxxxxxx" pattern="^0[0-9]{8,}" maxlength="10"><br>
    收件人信箱:<input type="email" name="remail" required placeholder="example@mail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><br>

    收件人地址:<input type="text" name="raddress" value="" required maxlength='35'><br>

    寄件時間<input type="date" name="rsend_time" required ><br>

    收件時間<input type="date" name="arrive_time" required ><br>

	送達:<input type="text" name="if_success" required pattern="^[01]$">(0代表未送達；1則是已送達)<br/>

    
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
<?php } ?>
    </h2>
	</body>
</html>