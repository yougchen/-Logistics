<?php
session_start();
date_default_timezone_set("Asia/Taipei");
if(isset($_POST["number"])){



include("config.php");
$number = $_POST["number"];
$rname = $_POST["rname"];
$rphone = $_POST["rphone"];
$remail = $_POST["remail"];
$raddress = $_POST["raddress"];
$rsend_time = $_POST["rsend_time"];

$rsend_time = date("Y-m-d H:i:s", $rsend_time);	
$mem_id = $_SESSION['loginsession'];




// $sql = "INSERT INTO invoice (inv_id,receiver_name, receiver_phone, receiver_email, arrive_address, send_time,arrive_time,mem_id) VALUES (NULL,'".$rname."', '".$rphone."', '".$remail."', '".$raddress."', '".$rsend_time."','".$now."')";



// if (!mysqli_query($link,$sql))
//   {
//   echo("<br/>Error description: " . mysqli_error($link));
//   }


// $result = mysqli_query($link,$sql) or die("MySQL insert error");


//找出當前Auto_increment當前值
$sql="show table status where name ='invoice'";
$query=mysqli_query($link,$sql);
$row = mysqli_fetch_array($query);
$Auto_increment = $row['Auto_increment'];

//尋找mem_id
$sql5="SELECT mem_id FROM member WHERE mem_account_num='$mem_id'";
$query2=mysqli_query($link,$sql5);
$row2 = mysqli_fetch_array($query2);
$mem_id=$row2["mem_id"];

//echo "<br/>".$Auto_increment;

for($n = 1;$n <= $number;$n++){
	$packagename = "PackageType".$n;
	$delivery_method = "delivery_method".$n;
	$package_type = $_POST[$packagename];
	$length = $_POST["length"];
	$width = $_POST["width"];
	$height = $_POST["height"];
	$weight = $_POST["weight"];
	$delivery_method = $_POST[$delivery_method];


	$array_num=$n-1;

  if ($package_type == 1) {
  $pac_price = 60;
} else if ($package_type == 2) {
  $pac_price = 120;
} else if ($package_type == 3) {
  $pac_price = 180;
} else {
  $pac_price = 150;
}


$sql2 = "INSERT INTO package (pac_id,pac_type, pac_length, pac_width, pac_height, pac_weight, pac_delivery_method,pac_price,inv_id) VALUES (NULL,'".$package_type."', '".$length[$array_num]."', '".$width[$array_num]."', '".$height[$array_num]."', '".$weight[$array_num]."', '$delivery_method','$pac_price','$Auto_increment')";




$result = mysqli_query($link,$sql2) or die("MySQL insert error");

//======================================================================================

if ($delivery_method == 1) {
  $arrive_time = strtotime($rsend_time);
  $arrive_time = strtotime("+5 days", $arrive_time);
  //echo date("Y-m-d", $arrive_time);
  $arrive_time = date("Y-m-d H:i:s", $arrive_time);
} else {
	$arrive_time = strtotime($rsend_time);
  $arrive_time = strtotime("+2 days", $arrive_time);
  //echo date("Y-m-d", $arrive_time);
  $arrive_time = date("Y-m-d H:i:s", strtotime($arrive_time));

  //echo $arrive_time;
}

$sql4 = "SELECT SUM(pac_price) as total_price FROM package, invoice WHERE package.inv_id = invoice.inv_id group by invoice.inv_id  ";
$result2 = mysqli_query($link,$sql4) or die("my sql select error");
$row=mysqli_fetch_assoc($result2);
$total_price = $row["total_price"];
$sql3 = "INSERT INTO invoice (inv_id,receiver_name, receiver_phone, receiver_email, arrive_address, send_time,arrive_time,mem_id) VALUES (NULL,'".$rname."', '".$rphone."', '".$remail."', '".$raddress."', '".$rsend_time."','$arrive_time','$mem_id')";



if (!mysqli_query($link,$sql3))
  {
  echo("<br/>Error description: " . mysqli_error($link));
  }


$result = mysqli_query($link,$sql3) or die("MySQL insert error");


echo "表單已送出";
}
//header("refresh:3;url = account.php");
}
