<!DOCTYPE html>
<html lang = "en">
    <head>
        <title></title>
        <meta name = "viewport" content = "width=device-width, initial-scale=1" charset = "UTF-8">
        <link href = "css/style.css" rel = "stylesheet">
    </head>
    <body>

        <?php

   		header('Content-Type: text/html; charset=utf-8');
        session_start();
        include("config.php");
		
		mysqli_query($link,"SET NAMES 'UTF8'");
        
        $result = mysqli_query($link, "SELECT * FROM invoice");
        echo "<table border=1>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>編號</th>";
        echo "<th>收件人名字</th>";
        echo "<th>收件人手機</th>";
        echo "<th>收件人信箱</th>";
        echo "<th>收件時間</th>";
        echo "<th>收件地址</th>";
        echo "<th>寄件時間</th>";
        echo "<th>金額</th>";
        echo "<th>送達</th>";
        echo "<th>寄件人編號</th>";
        echo "</tr>";
        echo "</thead>";
        while($row = mysqli_fetch_assoc($result)){
	        echo "<tr>";
        	echo "<td>";
	        echo $row["inv_id"];
	        $id = $row["inv_id"];
        	echo "</td><td>";
        	echo $row["receiver_name"];
        	echo "</td><td>";
        	echo $row["receiver_phone"];
        	echo "</td><td>";
        	echo $row["receiver_email"];
            echo "</td><td>";
        	echo $row["arrive_time"];
            echo "</td><td>";
        	echo $row["arrive_address"];
            echo "</td><td>";
        	echo $row["send_time"];
            echo "</td><td>";
        	echo $row["total_price"];
            echo "</td><td>";
        	echo $row["if_success"];
            echo "</td><td>";
        	echo $row["mem_id"];
        	echo "</td>";
        	echo "<td>";
        	echo "<a href = 'idelete_m.php?inv_id=$id'>delete</a>";
        	echo "</td>";
        	echo "<td>";
        	echo "<a href = 'iupdate_m.php?inv_id=$id'>modify</a>";
        	echo "</td>";
        	echo "</tr>";
        }
        echo "</table>";

        mysqli_close($link);
        ?>
    </body>
</html>