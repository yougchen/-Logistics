<?php
header('Content-Type: text/html; charset=utf-8');

include("config.php");
		
mysqli_query($link,"SET NAMES 'UTF8'");
$id=$_GET["inv_id"];

$sql2="SELECT * FROM invoice WHERE inv_id='$id'";
$result=mysqli_query($link,$sql2);

while ($row=mysqli_fetch_assoc($result)) {
	$inv_id=$row["inv_id"];
	$receiver_name=$row["receiver_name"];
	$receiver_phone=$row["receiver_phone"];
	$receiver_email=$row["receiver_email"];
	$arrive_time=$row["arrive_time"];
	$arrive_address=$row["arrive_address"];
	$send_time=$row["send_time"];
	$total_price=$row["total_price"];
	$if_success=$row["if_success"];
	$mem_id=$row["mem_id"];
}
echo "
<meta charset=\"utf-8\">
<form action='actioniupdate_m.php' method='post' accept-charset=\"utf-8\">";
//echo "ID:".$id."<br/>";

echo "姓名:<input type='text' value='$inv_id' name='inv_id'><br/>";
echo "電話:<input type='text' value='$receiver_name' name='receiver_name'><br/>";
echo "地址:<input type='text' value='$receiver_phone' name='receiver_phone'><br/>";
echo "信箱:<input type='text' value='$receiver_email' name='receiver_email'><br/>";
echo "帳號:<input type='text' value='$arrive_time' name='arrive_time'><br/>";
echo "管理權限:<input type='text' value='$arrive_address' name='arrive_address'><br/>";
echo "生日:<input type='text' value='$send_time' name='send_time'><br/>";
echo "職業:<input type='text' value='$total_price' name='total_price'><br/>";
echo "性別:<input type='text' value='$if_success' name='if_success'><br/>";
echo "寄件人<input type='text' value='$mem_id' name='mem_id'>";
echo "<input type='submit' neme = 'submit' value='修改'>";
echo "</form>";





?>