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

<h2>

	<div class = "analysis">
			<a href="analysis_m.php?factor=寄送包裹種類分析">寄送包裹種類分析</a>

			<a href="analysis_m.php?factor=寄件地區數量分析">寄件地區數量分析</a>

			<a href="analysis_m.php?factor=收件地區數量分析">收件地區數量分析</a>

			<a href="analysis_m.php?factor=會員分析">會員分析</a>
	</div>
</h2>
			
	<div class = "analysis">
    <?php
if(isset($_GET["factor"]))
{
    if($_GET["factor"]=="寄送包裹種類分析")
    {
    	echo "<h2>包裹種類</h2><form action = \"search_pac_type_m.php\" method = \"POST\">
 		<select name=\"pac_type\">
    			<option value = '一般常溫用品'>一般常溫用品</option>
    			<option value = '低溫保鮮品'>低溫保鮮品</option>
    			<option value = '冷凍保鮮品'>冷凍保鮮品</option>
    			<option value = '易碎品'>易碎品</option>

    		</select>
    		<input type=\"submit\" name=\"submit\" value=\"submit\">";
    }
	
	if($_GET["factor"]=="收件地區數量分析")
    {
    	echo  "<h2>收件地區</h2><form action = \"search_receive_by_location_m.php\" method = \"POST\">
 		<select name=\"location\">
    			<option value = '基隆市'>基隆市</option>
    			<option value = '台北市'>台北市</option>
    			<option value = '新北市'>新北市</option>
    			<option value = '桃園縣'>桃園縣</option>
    			<option value = '新竹市'>新竹市</option>
    			<option value = '新竹縣'>新竹縣</option>
    			<option value = '苗栗縣'>苗栗縣</option>
    			<option value = '台中市'>台中市</option>
    			<option value = '彰化縣'>彰化縣</option>
    			<option value = '南投縣'>南投縣</option>
    			<option value = '雲林縣'>雲林縣</option>
    			<option value = '嘉義市'>嘉義市</option>
    			<option value = '嘉義縣'>嘉義縣</option>
    			<option value = '台南市'>台南市</option>
    			<option value = '高雄市'>高雄市</option>
    			<option value = '屏東縣'>屏東縣</option>
    			<option value = '台東縣'>台東縣</option>
    			<option value = '花蓮縣'>花蓮縣</option>
    			<option value = '澎湖縣'>澎湖縣</option>
    			<option value = '金門縣'>金門縣</option>
    			<option value = '連江縣'>連江縣</option>

    		</select>
    		<input type=\"submit\" name=\"submit\" value=\"submit\"";
    }

    if($_GET["factor"]=="會員分析")
    {

    	echo  "<form action = \"search_account.php\" method = \"POST\">
    	會員年齡:<input type=\"text\" name=\"age\" value='' pattern = '^[1-9]{1,}[0-9]*' maxlength = 3><br>
 		<select name=\"mem_gender\">
 				<option value = 'null'></option>
    			<option value = '男'>男</option>
    			<option value = '女'>女</option>

    		</select>
    		<input type=\"submit\" name=\"submit\" value=\"submit\"";
    }
    
    if($_GET["factor"]=="寄件地區數量分析")
    {
    	echo  "<h2>寄件地區</h2><form action = \"search_send_by_location_m.php\" method = \"POST\">
 		<select name=\"location\">
    			<option value = '基隆市'>基隆市</option>
    			<option value = '台北市'>台北市</option>
    			<option value = '新北市'>新北市</option>
    			<option value = '桃園縣'>桃園縣</option>
    			<option value = '新竹市'>新竹市</option>
    			<option value = '新竹縣'>新竹縣</option>
    			<option value = '苗栗縣'>苗栗縣</option>
    			<option value = '台中市'>台中市</option>
    			<option value = '彰化縣'>彰化縣</option>
    			<option value = '南投縣'>南投縣</option>
    			<option value = '雲林縣'>雲林縣</option>
    			<option value = '嘉義市'>嘉義市</option>
    			<option value = '嘉義縣'>嘉義縣</option>
    			<option value = '台南市'>台南市</option>
    			<option value = '高雄市'>高雄市</option>
    			<option value = '屏東縣'>屏東縣</option>
    			<option value = '台東縣'>台東縣</option>
    			<option value = '花蓮縣'>花蓮縣</option>
    			<option value = '澎湖縣'>澎湖縣</option>
    			<option value = '金門縣'>金門縣</option>
    			<option value = '連江縣'>連江縣</option>

    		</select>
    		<input type=\"submit\" name=\"submit\" value=\"submit\"";
    }
}
	}
}

?>
</div>
</body>
</html>

