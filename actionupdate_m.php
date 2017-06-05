<?php
	session_start();
    include("config.php");
	$account = $_SESSION["login)session"];

$mem_id=$_POST["mem_id"];
$mem_name=$_POST["mem_name"];
$mem_phone=$_POST["mem_phone"];
$mem_address=$_POST["mem_address"];
$mem_email=$_POST["mem_email"];
$mem_account_num=$_POST["mem_account"];
$manager_right=$_POST["manager_right"];
$mem_birth=$_POST["mem_birth"];
$mem_career=$_POST["mem_career"];
$mem_gender=$_POST["mem_gender"];

$sql2="UPDATE member SET mem_name='$mem_name',mem_phone='$mem_phone',mem_address='$mem_address',mem_email='$mem_email',mem_account_num='$mem_account_num',manager_right='$manager_right',mem_birth='$mem_birth',mem_career='$mem_career',mem_gender='$mem_gender'WHERE mem_id='$mem_id'";

$result=mysqli_query($link,$sql2);
$result=mysqli_query($link,"SELECT*FROM member");

echo "<table border=1>";
echo "<thead>";
        echo "<tr>";
        echo "<th>姓名</th>";
        echo "<th>電話</th>";
        echo "<th>地址</th>";
        echo "<th>信箱</th>";
        echo "<th>帳號</th>";
        echo "<th>密碼</th>";
        echo "<th>管理權限</th>";
        echo "<th>生日</th>";
        echo "<th>職業</th>";
        echo "<th>性別</th>";
        echo "<th>刪除</th>";
        echo "<th>修改</th>";
        echo "<th>密碼修改</th>";
        echo "</tr>";
        echo "</thead>";
while($row=mysqli_fetch_assoc($result)){
	echo "<tr>";
        	echo "<td>";
	        echo $row["mem_name"];
        	$id = $row["mem_id"];
        	echo "</td><td>";
        	echo $row["mem_phone"];
        	echo "</td><td>";
        	echo $row["mem_address"];
            echo "</td><td>";
        	echo $row["mem_email"];
            echo "</td><td>";
        	echo $row["mem_account_num"];
            echo "</td><td>";
        	echo $row["mem_password"];
            echo "</td><td>";
        	echo $row["manager_right"];
            echo "</td><td>";
        	echo $row["mem_birth"];
            echo "</td><td>";
        	echo $row["mem_career"];
            echo "</td><td>";
        	echo $row["mem_gender"];
	echo "</td>";
	echo "<td>";
	echo "<a href='delete_m.php?mem_id=$mem_id'>刪除</a>";
	echo "</td>";
	echo "<td>";
	echo "<a href='update_m.php?mem_id=$mem_id'>資料修改</a>";
	echo "</td>";
	echo "<td>";
        	echo "<a href = 'pwd_edit_m.php?mem_id=$id'>密碼修改</a>";
        	echo "</td>";
	echo "</tr>";
}
echo "</table>";
echo "<a href = 'logout.php'>登出</a>";
?>