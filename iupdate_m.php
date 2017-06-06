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
$id=$_GET["inv_id"];

$sql2="SELECT * FROM invoice WHERE inv_id='$id'";
$result=mysqli_query($link,$sql2);

while ($row=mysqli_fetch_assoc($result)) {
	$inv_id=$row["inv_id"];
	$receiver_name=$row["receiver_name"];
	$receiver_phone=$row["receiver_phone"];
	$receiver_email=$row["receiver_email"];
	$arrive_time=$row["arrive_time"];
	$arrive_address=$row["arrive_address"];
	$send_time=$row["send_time"];
	$total_price=$row["total_price"];
	$if_success=$row["if_success"];
	$mem_id=$row["mem_id"];
}
echo "
<meta charset=\"utf-8\">
<form action='actioniupdate_m.php' method='post' accept-charset=\"utf-8\">";
//echo "ID:".$id."<br/>";

echo "編號:<input type='text' value='$inv_id' name='inv_id'><br/>";
echo "收件人名字:<input type='text' value='$receiver_name' name='receiver_name'><br/>";
echo "收件人手機:<input type='text' value='$receiver_phone' name='receiver_phone'><br/>";
echo "收件人信箱:<input type='text' value='$receiver_email' name='receiver_email'><br/>";
echo "收件時間:<input type='text' value='$arrive_time' name='arrive_time'><br/>";
echo "收件地址:<input type='text' value='$arrive_address' name='arrive_address'><br/>";
echo "寄件時間:<input type='text' value='$send_time' name='send_time'><br/>";
echo "金額:<input type='text' value='$total_price' name='total_price'><br/>";
echo "送達:<input type='text' value='$if_success' name='if_success'><br/>";
echo "寄件人編號<input type='text' value='$mem_id' name='mem_id'>";
echo "<input type='submit' neme = 'submit' value='修改'>";
echo "</form>";





?>
