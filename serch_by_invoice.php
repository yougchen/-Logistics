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
    <div class = "menu">

        <a href = "invoice_list.php">訂單管理</a>
   
        <a href = "package_list.php">包裹管理</a>
  
        <a href = "list_m.php">會員管理</a>
        
        <a href = "analysis_m.php">資料分析</a>

        <a href="index.php">首頁</a>

         <a href="logout.php">登出</a>
    </div>

<html/>
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
   		
        include("config.php");
		
		mysqli_query($link,"SET NAMES 'UTF8'");
		$id=$_GET["inv_id"];
        
        $result = mysqli_query($link, "SELECT * FROM package where inv_id = '$id'");
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
        echo "<th>刪除</th>";
        echo "<th>資料修改</th>";
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