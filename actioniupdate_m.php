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

	<div class = "table">
	<h2>
    	<a href = "insert_invoice_m.php">訂單新增</a>
    </h2>
    </div>


<?php
		
mysqli_query($link,"SET NAMES 'UTF8'");

	//改後
	$inv_id=$_POST["inv_id"];

	//未改前
	$inv_id1=$_POST["inv_id1"];

	//判斷是否相同
	if($inv_id == $inv_id1){

	}
	else{
		//判斷inv_id是否已有
		if(isset($_POST["inv_id"]) && $_POST["inv_id"] != ""){
			//改後
			$inv_id=$_POST["inv_id"];
			$sql = "SELECT * FROM invoice WHERE inv_id = '$inv_id'";
			$result = mysqli_query($link, $sql);
			$total_records = mysqli_num_rows($result);
			//有資料
			if ($total_records > 0) {
				header("refresh:3;url=invoice_list.php");
				echo "<br />編號已有";
				exit();
			}
		}
	}


	$receiver_name=$_POST["receiver_name"];
	$receiver_phone=$_POST["receiver_phone"];
	$receiver_email=$_POST["receiver_email"];
	$arrive_time=$_POST["arrive_time"];
	$arrive_address=$_POST["arrive_address"];
	$send_time=$_POST["send_time"];
	$total_price=$_POST["total_price"];
	$if_success=$_POST["if_success"];
	$mem_id=$_POST["mem_id"];


	$sql2="UPDATE invoice SET inv_id='$inv_id', receiver_name='$receiver_name',receiver_phone='$receiver_phone',receiver_email='$receiver_email',arrive_time='$arrive_time',arrive_address='$arrive_address',send_time='$send_time',total_price='$total_price',if_success='$if_success',mem_id='$mem_id'WHERE inv_id='$inv_id1'";

	//使用package陣列記值必須有的。
	$array_num = 0;

	//取出package資料
    $result = mysqli_query($link, "SELECT * FROM package where inv_id = '$inv_id1'");

    while($row = mysqli_fetch_assoc($result)){


		$pac_id = $row["pac_id"];
		$package_type=$row["pac_type"];
		$length[]=$row["pac_length"];
		$width[]=$row["pac_width"];
		$height[]=$row["pac_height"];
		$weight[]=$row["pac_weight"];
		$delivery_method=$row["pac_delivery_method"];
		$pac_price=$row["pac_price"];

		//更新package
		$sql3="UPDATE package 
			SET pac_id='$pac_id',pac_type='$package_type',pac_length='$length[$array_num]',pac_width='$width[$array_num]',pac_height='$height[$array_num]',pac_weight='$weight[$array_num]',pac_delivery_method='$delivery_method',pac_price='$pac_price',inv_id='$inv_id'
			WHERE pac_id='$pac_id' and inv_id='$inv_id1'";

		mysqli_query($link,$sql3) or die("update fall");

    }


$result=mysqli_query($link,$sql2);
        $result = mysqli_query($link, "SELECT * FROM invoice order by inv_id");
        echo "<table border=1>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>最後運送預告</th>";
        echo "<th>編號</th>";
        echo "<th>收件人名字</th>";
        echo "<th>收件人手機</th>";
        echo "<th>收件人信箱</th>";
        echo "<th>收件時間</th>";
        echo "<th>收件地址</th>";
        echo "<th>寄件時間</th>";
        echo "<th>金額</th>";
        echo "<th>送達</th>";
        echo "<th>寄件人編號</th>";
        echo "<th>刪除</th>";
        echo "<th>資料修改</th>";
        echo "</tr>";
        echo "</thead>";
        while($row = mysqli_fetch_assoc($result)){
	        echo "<tr>";
        	echo "<td>";
	        $id = $row["inv_id"];
        	echo "<div class = 'mail'><h2><a href='send_email.php?inv_id=$id&factor=manager'>送到收件人的運送通知</a></h2></div>";
        	echo "</td><td>";
	        echo "<a href = 'search_by_invoice.php?inv_id=$id'>".$row["inv_id"]."</a>";
        	echo "</td><td>";
        	echo $row["receiver_name"];
        	echo "</td><td>";
        	echo $row["receiver_phone"];
        	echo "</td><td>";
        	echo $row["receiver_email"];
            echo "</td><td>";
        	echo $row["arrive_time"];
            echo "</td><td>";
        	echo $row["arrive_address"];
            echo "</td><td>";
        	echo $row["send_time"];
            echo "</td><td>";
        	echo $row["total_price"];
            if($row["if_success"]<1)
			{
				echo "<td>未送達</td>";
			}
			else
			{
				echo "<td>送達</td>";
			}
            echo "</td><td>";
        	echo $row["mem_id"];
        	echo "</td>";
        	echo "<td>";
        	echo "<a href = 'idelete_m.php?inv_id=$id'>delete</a>";
        	echo "</td>";
        	echo "<td>";
        	echo "<a href = 'iupdate_m.php?inv_id=$id'>modify</a>";
        	echo "</td>";
        	echo "</tr>";
        }
		echo "</table><br/>";
		echo "<a href = 'logout.php'>登出</a>";
	}
}
        ?>
</body>
</html>