<!--加入會員-->
<!DOCTYPE html>
<html>
<head>
    <title>急速運送</title>
    <link rel="stylesheet" href="normal.css">


</head>

    <body>
    <h1>急速快遞</h1> <br/>
    <div class="menu">
            <a href="Service.php">商品服務</a>

            <a href="send.php">寄件</a>
   
            <a href="recive.php">收件</a>

            <a href="search.php">查詢</a>
  
            <a href="account.php">帳號</a>

            <a href="index.php">首頁</a>

            <a href="logout.php">登出</a>
    </div>

    <div class = "table_account">
        <?php
   		header('Content-Type: text/html; charset=utf-8');
        session_start();
        include("config.php");
		
		mysqli_query($link,"SET NAMES 'UTF8'");
		

        

        $account = $_SESSION["loginsession"];
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
        	echo "</tr>";
        }
        echo "</table>";

        	echo "<h4><br /><a href = 'update.php?mem_id=$id'>修改個人資料</a>";
        	echo "<a href = 'pwd_edit.php?mem_id=$id'>變更密碼</a><br /></h4></div>";

        	echo "<div class = 'table_account_delete'><br /><h4>是否要刪除帳戶？<a href = 'delete.php?mem_id=$id'>刪除</a>";

        echo "<br /><br /><a href = 'logout.php'>登出</a> </h4>";

        mysqli_close($link);
        ?>
    </div>
    </body>
</html>
