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
<?php
date_default_timezone_set("Asia/Taipei");



if(isset($_POST["number"])){

mysqli_query($link,"SET NAMES 'UTF8'");
$number = $_POST["number"];
$rname = $_POST["rname"];
$rphone = $_POST["rphone"];
$remail = $_POST["remail"];
$raddress = $_POST["raddress"];
$rsend_time = $_POST["rsend_time"];
$delivery_method = $_POST["pac_delivery_method"];


$rsend_time = date("Y-m-d H:i:s", $rsend_time);	
$mem_id = $_SESSION['loginsession'];



// $sql = "INSERT INTO invoice (inv_id,receiver_name, receiver_phone, receiver_email, arrive_address, send_time,arrive_time,mem_id) VALUES (NULL,'".$rname."', '".$rphone."', '".$remail."', '".$raddress."', '".$rsend_time."','".$now."')";



// if (!mysqli_query($link,$sql))
//   {
//   echo("<br/>Error description: " . mysqli_error($link));
//   }


// $result = mysqli_query($link,$sql) or die("MySQL insert error");


//找出當前invoice Auto_increment當前值
$sql="show table status where name ='invoice'";
$query=mysqli_query($link,$sql);
$row = mysqli_fetch_array($query);
$Auto_increment = $row['Auto_increment'];

//尋找mem_id
$sql2="SELECT mem_id FROM member WHERE mem_account_num ='$mem_id'";
$query2=mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($query2);
$mem_id=$row2["mem_id"];
//設定到達時間
if ($delivery_method == "一般寄件") {
  $arrive_time = strtotime($rsend_time);
  $arrive_time = strtotime("+5 days", $arrive_time);
  //echo date("Y-m-d", $arrive_time);
  $arrive_time = date("Y-m-d H:i:s", $arrive_time);
} else if ($delivery_method == "急件"){
	$arrive_time = strtotime($rsend_time);
  $arrive_time = strtotime("+1 days", $arrive_time);
  //echo date("Y-m-d", $arrive_time);
  $arrive_time = date("Y-m-d H:i:s", $arrive_time);
}
//insert invoice
$sql3 = "INSERT INTO invoice (inv_id,receiver_name, receiver_phone, receiver_email, arrive_address, send_time,arrive_time,mem_id,if_success)
 VALUES ('".$Auto_increment."','".$rname."', '".$rphone."', '".$remail."', '".$raddress."', '".$rsend_time."','".$arrive_time."','".$mem_id."',0)";

//if (!mysqli_query($link,$sql3))
//  {
//  echo("<br/>Error description: " . mysqli_error($link));
 // }


$result = mysqli_query($link,$sql3) or die("MySQL insert error");

//運費對應
//常溫
$price = array("60" => "130", "90" => "170", "120" => "210", "150" => "250");
$K = array_keys($price);
//低溫
$price_cold = array("60" => "160", "90" => "225", "120" => "290");
$K_cold = array_keys($price_cold);
//經濟
$price_cheap = array("5000" => "95");
$K_cheap = array_keys($price_cheap);

for($n = 1;$n <= $number;$n++){
	$packagename = "PackageType".$n;
	$package_type = $_POST[$packagename];
	$length = $_POST["length"];
	$width = $_POST["width"];
	$height = $_POST["height"];
	$weight = $_POST["weight"];

	$array_num=$n-1;
include("package_price_count.php");


  $sql4 = "INSERT INTO package (pac_id,pac_type, pac_length, pac_width, pac_height, pac_weight, pac_delivery_method,pac_price,inv_id) 
  VALUES ('$n','".$package_type."', '".$length[$array_num]."', '".$width[$array_num]."', '".$height[$array_num]."', '".$weight[$array_num]."', '$delivery_method','$pac_price','$Auto_increment')";



  $result = mysqli_query($link,$sql4) or die("MySQL insert error");
}


//======================================================================================


$sql5 = "SELECT SUM(pac_price) as total_price FROM package WHERE package.inv_id = '$Auto_increment' ";
$result = mysqli_query($link,$sql5) or die("my sql select error");
$row=mysqli_fetch_assoc($result);
$total_price = $row["total_price"];
// $data_array1[] = array (
// "package_type" => $package_type,
// "delivery_method" => $delivery_method,
// "packagename" => $packagename,
// "length" => $length,
// "width" => $width,
// "height" => $height,
// "weight" => $weight
// );
//echo json_encode($data_array1);

// $data_array2[] = array (
//   "inv_id" => $Auto_increment,
//   "receiver_name" => $rname,
//   "receiver_email" => $remail,
//   "recevier_phone" => $rphone,
//   "arrive_address" => $raddress,
//   "total_price" => $total_price,
//   "send_time" => $rsend_time,
//   "arrive_time" => $arrive_time,
//   "mem_id" => $mem_id
// );
//echo json_encode($data_array2);
$inv_id = $Auto_increment;

$sql6="UPDATE invoice SET total_price='$total_price' WHERE inv_id='$inv_id'";

$result=mysqli_query($link,$sql6) or die("mysql update error");



echo "<h2>表單已送出";
echo "<br>";
echo "<a href = 'bill.php?inv_id=$Auto_increment'>查看表單</a>";
echo "<br>";
echo "<a href = 'send_email.php?inv_id=$Auto_increment'>配送預告</a>";
echo "<br>";
echo "<a href = 'index.php'>回到首頁</a></h2>";

}
}
