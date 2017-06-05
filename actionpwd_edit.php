<?php
    session_start();
    include("config.php");
	
    $id = $_POST["mem_id"];
    $OldPassword=$_POST["OldPassword"];
    $NewPassword=$_POST["NewPassword"];
    $NewPassword2=$_POST["NewPassword2"];

    
    $sql = "SELECT * FROM member WHERE mem_id = '".$id."' AND mem_password = '".$OldPassword."'";
    $sql2 = "SELECT * FROM member WhERE mem_id = '".$id."'";
    $result = mysqli_query($link, $sql);
    $result2 = mysqli_query($link, $sql2);
    $total_records = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($total_records > 0) {
        if ($NewPassword == $NewPassword2) {
            $sql2="UPDATE member SET mem_password ='".$NewPassword."' WHERE mem_id ='".$id."'";
            $result2=mysqli_query($link,$sql2);
            $result2=mysqli_query($link,"SELECT*FROM member");
            echo "密碼更改成功 請重新登入";
            header("refresh:3;url = logout.php");
        }
        else {
            echo "新密碼不同!!!</br>";
            echo "<table border=1>";
echo "<thead>";
        echo "<tr>";
        echo "<th>姓名</th>";
        echo "<th>電話</th>";
        echo "<th>地址</th>";
        echo "<th>信箱</th>";
        echo "<th>帳號</th>";
        echo "<th>密碼</th>";
        echo "<th>生日</th>";
        echo "<th>職業</th>";
        echo "<th>性別</th>";
        echo "<th>刪除</th>";
        echo "<th>修改</th>";
        echo "<th>密碼修改</th>";
        echo "</tr>";
        echo "</thead>";
            while($row=mysqli_fetch_assoc($result2)){
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
        	echo $row["mem_birth"];
            echo "</td><td>";
        	echo $row["mem_career"];
            echo "</td><td>";
        	echo $row["mem_gender"];
	echo "</td>";
	echo "<td>";
	echo "<a href='delete.php?mem_id=$id'>刪除</a>";
	echo "</td>";
	echo "<td>";
	echo "<a href='update.php?mem_id=$id'>資料修改</a>";
	echo "</td>";
	echo "<td>";
        	echo "<a href = 'pwd_edit_m.php?mem_id=$id'>密碼修改</a>";
        	echo "</td>";
	echo "</tr>";
}
echo "</table>";
echo "<a href = 'logout.php'>登出</a>";
        }
    }
    else {
        echo "舊密碼錯誤!!!</br>";
        echo "<table border=1>";
echo "<thead>";
        echo "<tr>";
        echo "<th>姓名</th>";
        echo "<th>電話</th>";
        echo "<th>地址</th>";
        echo "<th>信箱</th>";
        echo "<th>帳號</th>";
        echo "<th>密碼</th>";
        echo "<th>生日</th>";
        echo "<th>職業</th>";
        echo "<th>性別</th>";
        echo "<th>刪除</th>";
        echo "<th>修改</th>";
        echo "<th>密碼修改</th>";
        echo "</tr>";
        echo "</thead>";
            while($row=mysqli_fetch_assoc($result2)){
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
        	echo $row["mem_birth"];
            echo "</td><td>";
        	echo $row["mem_career"];
            echo "</td><td>";
        	echo $row["mem_gender"];
	echo "</td>";
	echo "<td>";
	echo "<a href='delete.php?mem_id=$id'>刪除</a>";
	echo "</td>";
	echo "<td>";
	echo "<a href='update.php?mem_id=$id'>資料修改</a>";
	echo "</td>";
	echo "<td>";
        	echo "<a href = 'pwd_edit_m.php?mem_id=$id'>密碼修改</a>";
        	echo "</td>";
	echo "</tr>";
}
echo "</table>";
echo "<a href = 'logout.php'>登出</a>";
    }
?>