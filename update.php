<?php
include("config.php");


$id=$_GET["uid"];

$sql2="SELECT * FROM user WHERE uid='$id'";
$result=mysqli_query($link,$sql2);

while ($row=mysqli_fetch_assoc($result)) {
	$uname=$row["uname"];
	$uacc=$row["uacc"];
}
echo "<form action='actionupdate.php' method='post'>";
echo "ID:".$id."<br/>";
echo "<input type='hidden' value='$id' name='uid'>";
echo "Name<input type='text' value='$uname' name='uname'><br/>";
echo "Account<input type='text' value='$uacc' name='uacc'><br/>";
echo "<input type='submit' value='modify'>";
echo "</form>";



?>