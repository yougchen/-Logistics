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
      background-color: white;
      color: black;
      font-size: 10px; 
      font-family: 微軟正黑體;
      margin: 0px 50px 0px 50px;
      padding: 0px 10px 0px 10px

    }
    table{
        border:0;
        width:1100px;
    }

    tr { 
        border-bottom:1px solid; 
    }
</style>

</head>

    <body>
    <h1>急速快遞</h1> <br/>
    <div class="menu">
            <a href = "invoice_list.php">訂單管理</a>
   
        <a href = "package_list.php">包裹管理</a>
  
        <a href = "list_m.php">會員管理</a>
        
        <a href = "analysis_m.php">資料分析</a>

        <a href="index.php">首頁</a>

         <a href="logout.php">登出</a>
    </div>
<html/>
<?php

header('Content-Type: text/html; charset=utf-8');

include("config.php");
		
mysqli_query($link,"SET NAMES 'UTF8'");
$id=$_GET["pac_id"];
$inv_id = $_GET["inv_id"];

$sql2="SELECT * FROM package WHERE pac_id='$id' and inv_id='$inv_id'";
$result=mysqli_query($link,$sql2);

while ($row=mysqli_fetch_assoc($result)) {
	$pac_id=$row["pac_id"];
	$pac_type=$row["pac_type"];
	$pac_length=$row["pac_length"];
	$pac_width=$row["pac_width"];
	$pac_height=$row["pac_height"];
	$pac_weight=$row["pac_weight"];
	$pac_delivery_method=$row["pac_delivery_method"];
	$pac_price=$row["pac_price"];
	$inv_id=$row["inv_id"];
}

echo "<meta charset=\"utf-8\">";
if(isset($_GET["factor"]))
{
	echo "<form action='search_by_invoice.php?inv_id=$inv_id' method='post' accept-charset=\"utf-8\">";
}
else
{
	echo "<form action='actionpupdate_m.php' method='post' accept-charset=\"utf-8\">";
//echo "ID:".$id."<br/>";
}
echo "包裹編號:<input type='text' value='$pac_id' name='pac_id'><br/>";
echo "包裹品項:<input type='text' value='$pac_type' name='pac_type'><br/>";
echo "包裹長度:<input type='text' value='$pac_length' name='pac_length'><br/>";
echo "包裹寬度:<input type='text' value='$pac_width' name='pac_width'><br/>";
echo "包裹高度:<input type='text' value='$pac_height' name='pac_height'><br/>";
echo "包裹運送方式:<input type='text' value='$pac_weight' name='pac_weight'><br/>";
echo "寄件方式:<input type='text' value='$pac_delivery_method' name='pac_delivery_method'><br/>";
echo "金額:<input type='text' value='$pac_price' name='pac_price'><br/>";
echo "訂單編號:<input type='text' value='$inv_id' name='inv_id'><br/>";
echo "<input type='submit' neme = 'submit' value='修改'>";
echo "</form>";





?>