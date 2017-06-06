<?php
header('Content-Type: text/html; charset=utf-8');

include("config.php");
		
mysqli_query($link,"SET NAMES 'UTF8'");
$id=$_GET["pac_id"];

$sql2="SELECT * FROM package WHERE pac_id='$id'";
$result=mysqli_query($link,$sql2);

while ($row=mysqli_fetch_assoc($result)) {
	$pac_id=$row["pac_id"];
	$pac_type=$row["pac_type"];
	$pac_length=$row["pac_length"];
	$pac_width=$row["pac_width"];
	$pac_height=$row["pac_height"];
	$pac_weight=$row["pac_weight"];
	$pac_delivery_method=$row["pac_delivery_method"];
	$pac_price=$row["pac_price"];
	$inv_id=$row["inv_id"];
}
echo "
<meta charset=\"utf-8\">
<form action='actionpupdate_m.php' method='post' accept-charset=\"utf-8\">";
//echo "ID:".$id."<br/>";

echo "姓名:<input type='text' value='$pac_id' name='pac_id'><br/>";
echo "電話:<input type='text' value='$pac_type' name='pac_type'><br/>";
echo "地址:<input type='text' value='$pac_length' name='pac_length'><br/>";
echo "信箱:<input type='text' value='$pac_width' name='pac_width'><br/>";
echo "帳號:<input type='text' value='$pac_height' name='pac_height'><br/>";
echo "管理權限:<input type='text' value='$pac_weight' name='pac_weight'><br/>";
echo "生日:<input type='text' value='$pac_delivery_method' name='pac_delivery_method'><br/>";
echo "職業:<input type='text' value='$pac_price' name='pac_price'><br/>";
echo "性別:<input type='text' value='$inv_id' name='inv_id'><br/>";
echo "<input type='submit' neme = 'submit' value='修改'>";
echo "</form>";





?>