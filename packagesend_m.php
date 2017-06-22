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

<?php
if(isset($_POST["number"]))
{

	mysqli_query($link,"SET NAMES 'UTF8'");

	$number = $_POST["number"];
	$rname = $_POST["rname"];
	$rphone = $_POST["rphone"];
	$remail = $_POST["remail"];
	$raddress = $_POST["raddress"];
	$rsend_time = $_POST["rsend_time"];
	$arrive_time = $_POST["arrive_time"];
	$if_success = $_POST["if_success"];


	$mem_id = $_SESSION['loginsession'];

	//尋找mem_id
	$sql2="SELECT mem_id FROM member WHERE mem_account_num ='$mem_id'";
	$query2=mysqli_query($link,$sql2);
	$row2 = mysqli_fetch_array($query2);
	$mem_id=$row2["mem_id"];

	//判斷inv_id是否已有
	if(isset($_POST["inv_id"]) && $_POST["inv_id"] != ""){
		$inv_id = $_POST["inv_id"];
		$sql = "SELECT * FROM invoice WHERE inv_id = '$inv_id'";
		$result = mysqli_query($link, $sql);
		$total_records = mysqli_num_rows($result);
		//有資料
		if ($total_records > 0) {
			header("refresh:3;url=insert_invoice_m.php");
			echo "<br />編號已有";
			exit();
		}
	}
	else{
		//找出當前invoice Auto_increment當前值
		$sql="show table status where name ='invoice'";
		$query=mysqli_query($link,$sql);
		$row = mysqli_fetch_array($query);
		$inv_id = $row['Auto_increment'];
	}

	$sql3 = "INSERT INTO invoice (inv_id,receiver_name, receiver_phone, receiver_email, arrive_address,send_time,arrive_time,mem_id,if_success)
 	VALUES ('".$inv_id."','".$rname."', '".$rphone."', '".$remail."', '".$raddress."', '".$rsend_time."','".$arrive_time."','".$mem_id."','".$if_success."')";
	$result = mysqli_query($link,$sql3) or die("MySQL insert error: ".mysqli_error($link));

	
    echo "<form action = \"actionsend_m.php\" method = \"POST\" accept-charset=\"utf-8\">";

    echo "<input type='hidden' name='inv_id' value='".$inv_id."'>"."<br>";

    echo "<input type='hidden' name='number' value='".$number."'>"."<br>";

	echo "運送方式:<input type=\"radio\" name=\"delivery_method\" value=\"一般寄件\" checked = \"True\">一般寄件
	         <input type=\"radio\" name=\"delivery_method\" value=\"急件\" >急件 <br>";
    for($n = 1;$n <= $number;$n++){
    	
    	echo "
    		包裹資料 <br>";
    		
    	echo "
            包裹類型:
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
else {
	$n = 1;
    echo "<form action = \"actionsend_m.php\" method = \"POST\" accept-charset=\"utf-8\">";
    //判斷是search_by_invoice還是包裹管理的
    if(isset($_GET["inv_id"])) {

    	echo "訂單編號:".$_GET["inv_id"];
    	$inv_id = $_GET["inv_id"];
	    echo "<input type='hidden' name='inv_id' value='".$inv_id."'>"."<br>";
    }
    else {

    	echo "訂單編號<input type='text' name='inv_id' value='' required>"."<br>";
    }	
		echo "
			包裹編號:<input type=\"text\" name=\"pac_id\">(不寫系統將會自動找編號)<br/>
			<br>
    		包裹資料 <br>";
    	echo "運送方式:<input type=\"radio\" name=\"delivery_method\" value=\"一般寄件\" checked = \"True\">一般寄件
		           <input type=\"radio\" name=\"delivery_method\" value=\"急件\" >急件 <br>";
    	echo "

            包裹類型:
    				<input type=\"radio\" name=\"PackageType".$n."\" value=\"一般常溫用品\" checked = \"True\">一般常溫用品
    				<input type=\"radio\" name=\"PackageType".$n."\" value=\"低溫保鮮品\">低溫保鮮品
    				<input type=\"radio\" name=\"PackageType".$n."\" value=\"冷凍保鮮品\">冷凍保鮮品
    				<input type=\"radio\" name=\"PackageType".$n."\" value=\"易碎品\">易碎品<br>
    		包裹長度:<input type=\"text\" name=\"length[]\" value=\"\" required pattern = '^[1-9{1}][0-9]*' maxlength = 11>(單位:公分)<br>
    		包裹寬度:<input type=\"text\" name=\"width[]\" value=\"\" required pattern = '^[1-9{1}][0-9]*' maxlength = 11>(單位:公分)<br>
    		包裹高度:<input type=\"text\" name=\"height[]\" value=\"\" required pattern = '^[1-9{1}][0-9]*' maxlength = 11>(單位:公分)<br>
    		包裹重量:<input type=\"text\" name=\"weight[]\" value=\"\" required pattern = '^[1-9{1}][0-9]*' maxlength = 11>(單位:公克)<br>";
    	

    

    
    echo "<input type=\"submit\" name=\"submit\" value=\"submit\">";
    echo "</form>";
}
	}
}

    ?>

         <a href="invoice_list.php">返回</a>  