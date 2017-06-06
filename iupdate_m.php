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
	$account_num=$row["	arrive_time"];
	$manager_right=$row["arrive_address"];
	$birth=$row["send_time"];
	$career=$row["total_price"];
	$gender=$row["if_success"];
	$mem_id=$row["mem_id"];
}
echo "
<meta charset=\"utf-8\">
<form action='actionupdate_m.php' method='post' accept-charset=\"utf-8\">";
//echo "ID:".$id."<br/>";
echo "姓名:<input type='text' value='$inv_id' name='inv_id'><br/>";
echo "電話:<input type='text' value='$receiver_name' name='mem_phone'><br/>";
echo "地址:<input type='text' value='$receiver_phone' name='receiver_phone'><br/>";
echo "信箱:<input type='text' value='$receiver_email' name='mem_email'><br/>";
echo "帳號:<input type='text' value='$account_num' name='mem_account'><br/>";
echo "管理權限:<input type='text' value='$manager_right' name='manager_right'><br/>";
echo "生日:<input type='text' value='$birth' name='mem_birth'><br/>";
echo "職業:<input type='text' value='$career' name='mem_career'><br/>";
echo "性別:<input type='text' value='$gender' name='mem_gender'><br/>";

echo "<input type='hidden' value='$mem_id' name='mem_id'>";
echo "<input type='submit' neme = 'submit' value='修改'>";
echo "</form>";





?>