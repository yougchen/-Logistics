<?php
    include("config.php");

$uid=$_POST["uid"];
$uname=$_POST["uname"];
$uacc=$_POST["uacc"];

$sql2="UPDATE user SET uname='$uname',uacc='$uacc'WHERE uid='$uid'";
$result=mysqli_query($link,$sql2);
$result=mysqli_query($link,"SELECT*FROM user");
echo "<table border=1>";
while($row=mysqli_fetch_assoc($result)){
	echo "<tr>";
	echo "<td>";
	echo $row["uid"];
	$uid=$row["uid"];
	echo "</td><td>";
	echo $row["uname"];
	echo "</td><td>";
	echo $row["uacc"];
	echo "</td>";
	echo "<td>";
	echo "<a href='del.php?uid=$uid'>delete</a>";
	echo "</td>";
	echo "<td>";
	echo "<a href='update.php?uid=$uid'>modify</a>";
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
?>