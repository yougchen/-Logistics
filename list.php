<!DOCTYPE html>
<html lang = "en">
    <head>
        <title></title>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <link href = "css/style.css" rel = "stylesheet">
    </head>
    <body>

        <?php
        session_start();
        include("config.php");
        $account = $_SESSION["login)session"];
        $sql = "SELECT * FROM member WhERE mem_account_num = '".$account."'";
        $result = mysqli_query($link, $sql);
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
        while($row = mysqli_fetch_assoc($result)){
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
        	echo "<a href = 'delete.php?mem_id=$id'>刪除</a>";
        	echo "</td>";
        	echo "<td>";
        	echo "<a href = 'update.php?mem_id=$id'>資料修改</a>";
        	echo "</td>";
            echo "<td>";
        	echo "<a href = 'pwd_edit.php?mem_id=$id'>密碼修改</a>";
        	echo "</td>";
        	echo "</tr>";
        }
        echo "</table>";
        echo "<a href = 'logout.php'>登出</a>";

        mysqli_close($link);
        ?>
    </body>
</html>