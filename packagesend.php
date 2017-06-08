<!--加入會員-->
<!DOCTYPE html>
<html>
<head>
    <title>急速運送</title>

<style>
/* http://meyerweb.com/eric/tools/css/reset/ 
v2.0 | 20110126
License: none (public domain)
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
  display: block;
}
body {
  line-height: 1;
}
ol, ul {
  list-style: none;
}
blockquote, q {
  quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
  content: '';
  content: none;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
}

/* start here */

    body{
      width: 700px;
      margin: 0 auto;
    }

    h1{
      text-align: center;
      font-size: 50px; 
      font-family: 微軟正黑體;
      margin: 10px 10px 20px 10px;
    }

    h2{
      text-align: center;
      font-size: 15px; 
      font-family: 微軟正黑體;
      margin: 35px 20px 20px 10px;
    }

    .menu{
      text-align: center;
    }

    .menu a{
      text-decoration: none;
      background-color: black;
      color: white;
      font-size: 20px; 
      font-family: 微軟正黑體;
      margin: 10px 0px 10px 0px;
      padding: 8px 20px 8px 20px;
    }
    
    .menu a:hover{
      background-color: white;
      color: black;
    }

    form{
      font-size: 18px;
      font-family: 微軟正黑體;
      text-align: left;
      padding: 20px;
    }

    input{
      font-size: 18px;
      font-family: 微軟正黑體;
      margin: 10px;
      padding: 8px;
    }

    a{
      text-decoration: none;
      background-color: black;
      color: white;
      font-size: 10px; 
      font-family: 微軟正黑體;
      margin: 0px 50px 0px 50px;
      padding: 0px 10px 0px 10px

    }
    table, th, td {
    border: 1px solid black;
    }  

    table {
    border-collapse: collapse;
    width: 100%;
    margin: 0px 0px 0px -100px;
    }

    th, td {
      padding: 15px;
    }
</style>

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
<html/>

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