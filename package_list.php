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
        
        $result = mysqli_query($link, "SELECT * FROM package");
        echo "<table border=1>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>包裹編號</th>";
        echo "<th>包裹品項</th>";
        echo "<th>包裹長度</th>";
        echo "<th>包裹寬度</th>";
        echo "<th>包裹高度</th>";
        echo "<th>包裹運送方式</th>";
        echo "<th>寄件時間</th>";
        echo "<th>金額</th>";
        echo "<th>訂單編號</th>";
        echo "</tr>";
        echo "</thead>";
        while($row = mysqli_fetch_assoc($result)){
	        echo "<tr>";
        	echo "<td>";
	        echo $row["pac_id"];
	        $id = $row["pac_id"];
        	echo "</td><td>";
        	echo $row["pac_type"];
        	echo "</td><td>";
        	echo $row["pac_length"];
        	echo "</td><td>";
        	echo $row["pac_width"];
            echo "</td><td>";
        	echo $row["pac_height"];
            echo "</td><td>";
        	echo $row["pac_weight"];
            echo "</td><td>";
        	echo $row["pac_delivery_method"];
            echo "</td><td>";
        	echo $row["pac_price"];
            echo "</td><td>";
        	echo $row["inv_id"];
        	echo "</td>";
        	echo "<td>";
        	echo "<a href = 'pdelete_m.php?pac_id=$id'>delete</a>";
        	echo "</td>";
        	echo "<td>";
        	echo "<a href = 'pupdate_m.php?pac_id=$id'>modify</a>";
        	echo "</td>";
        	echo "</tr>";
        }
        echo "</table>";

        mysqli_close($link);
        ?>
    </body>
</html>