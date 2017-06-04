<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

        <?php
        include("config.php");

        
        $result=mysqli_query($link,"SELECT*FROM user");
        echo "<table border=1>";
        while($row=mysqli_fetch_assoc($result)){
	        echo "<tr>";
        	echo "<td>";
	        echo $row["uid"];
        	$id=$row["uid"];
        	echo "</td><td>";
        	echo $row["uname"];
        	echo "</td><td>";
        	echo $row["uacc"];
        	echo "</td>";
        	echo "<td>";
        	echo "<a href='del.php?uid=$id'>delete</a>";
        	echo "</td>";
        	echo "<td>";
        	echo "<a href='update.php?uid=$id'>modify</a>";
        	echo "</td>";
        	echo "</tr>";
        }
        echo "</table>";

        mysqli_close($link);
        ?>
    </body>
</html>