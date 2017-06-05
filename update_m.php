<?php
header('Content-Type: text/html; charset=utf-8');

include("config.php");
		
mysqli_query($link,"SET NAMES 'UTF8'");
$id=$_GET["mem_id"];

$sql2="SELECT * FROM member WHERE mem_id='$id'";
$result=mysqli_query($link,$sql2);

while ($row=mysqli_fetch_assoc($result)) {
	$name=$row["mem_name"];
	$phone=$row["mem_phone"];
	$address=$row["mem_address"];
	$email=$row["mem_email"];
	$account_num=$row["mem_account_num"];
	$manager_right=$row["manager_right"];
	$birth=$row["mem_birth"];
	$career=$row["mem_career"];
	$gender=$row["mem_gender"];
}
echo "
<meta charset=\"utf-8\">
<form action='actionupdate_m.php' method='post' accept-charset=\"utf-8\">";
//echo "ID:".$id."<br/>";
echo "<input type='hidden' value='$id' name='mem_id'>";
echo "姓名:<input type='text' value='$name' name='mem_name'><br/>";
echo "電話:<input type='text' value='$phone' name='mem_phone'><br/>";
echo "地址:<input type='text' value='$address' name='mem_address'><br/>";
echo "信箱:<input type='text' value='$email' name='mem_email'><br/>";
echo "帳號:<input type='text' value='$account_num' name='mem_account'><br/>";
echo "管理權限:<input type='text' value='$manager_right' name='manager_right'><br/>";
echo "生日:<input type='text' value='$birth' name='mem_birth'><br/>";
echo "職業:<input type='text' value='$career' name='mem_career'><br/>";
echo "性別:<input type='text' value='$gender' name='mem_gender'><br/>";
echo "<input type='submit' neme = 'submit' value='修改'>";
echo "</form>";





?>