<?php
if(isset($_POST["number"]))
{
	$number = $_POST["number"];

	$rname = $_POST["rname"];
	$rphone = $_POST["rphone"];
	$remail = $_POST["remail"];
	$raddress = $_POST["raddress"];
	$rsend_time = $_POST["rsend_time"];

    echo "<form action = \"actionsend.php\" method = \"POST\">";
    echo "<input type='hidden' name='number' value='".$number."'>"."<br>";

    echo "<input type='hidden' name='rname' value='".$rname."'>"."<br>";

    echo "<input type='hidden' name='rphone' value='".$rphone."'>"."<br>";
    
    echo "<input type='hidden' name='remail' value='".$remail."'>"."<br>";

    echo "<input type='hidden' name='raddress' value='".$raddress."'>"."<br>";
    
    echo "<input type='hidden' name='rsend_time' value='".$rsend_time."'>"."<br>";
    for($n = 1;$n <= $number;$n++){
    	echo "
    		包裹資料 <br>
    		包裹類型:<input type=\"radio\" name=\"PackageType".$n."\" value=\"1\" checked = \"True\">一般常溫用品
    				<input type=\"radio\" name=\"PackageType".$n."\" value=\"2\">低溫保鮮品
    				<input type=\"radio\" name=\"PackageType".$n."\" value=\"3\">冷凍保鮮品
    				<input type=\"radio\" name=\"PackageType".$n."\" value=\"4\">易碎品 <br>
    		包裹長度:<input type=\"text\" name=\"length[]\" value=\"\"><br>
    		包裹寬度:<input type=\"text\" name=\"width[]\" value=\"\"><br>
    		包裹高度:<input type=\"text\" name=\"height[]\" value=\"\"><br>
    		包裹重量:<input type=\"text\" name=\"weight[]\" value=\"\"><br>
    		運送方式:<input type=\"radio\" name=\"delivery_method".$n."\" value=\"1\" checked = \"True\">一般寄件
             <input type=\"radio\" name=\"delivery_method".$n."\" value=\"2\">急件 <br>";

    }

    
    echo "<input type=\"submit\" name=\"submit\" value=\"submit\">";
    echo "</form>";
}

    ?>