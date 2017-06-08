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
      font-size: 18px;
      font-family: 微軟正黑體;
      color: blue;
      margin: 0 auto;
      text-decoration: none;
      text-align: center;
    }

    table, th, td {
    border: 1px solid black;
    }  

    table {
    border-collapse: collapse;
    width: 100%;
    margin: 0px 0px 0px -50px;
    }

    th, td {
      padding: 15px;
    } 
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
    </div>

<html/>
<html>
<head>
	<title>包裹查詢</title>
</head>
		<body>
			<h2>
			<?php 
				$link=@mysqli_connect(
				'localhost',
				'root',
				'',
				'logistics');

				$inv_id=$_POST["inv_id"];

				$sql1="SELECT invoice.inv_id,receiver_name,receiver_phone,receiver_email,
				arrive_time,arrive_address,
				send_time,pac_price,if_success,mem_id
 				FROM package,invoice where package.inv_id=invoice.inv_id and invoice.inv_id='".$inv_id."'";

				$result=mysqli_query($link,$sql1);
				echo "<table border=1>";
				echo "<tr>
              <td>發票號碼</td>
              <td>收件人名稱</td>
              <td>收件人電話</td>
              <td>收件人mail</td>
              <td>到貨時間</td>
				      <td>送貨地址</td>
              <td>送貨時間</td>
              <td>總價格</td>
              <td>送貨成功/否</td>
              <td>會員編號</td>
              </tr>";
				while($row=mysqli_fetch_assoc($result)){
					echo "<tr><td>";
					echo $row["inv_id"]."</td>";
					echo "<td>".$row["receiver_name"]."</td>";
					echo "<td>".$row["receiver_phone"]."</td>";
					echo "<td>".$row["receiver_email"]."</td>";
					echo "<td>".$row["arrive_time"]."</td>";
					echo "<td>".$row["arrive_address"]."</td>";
					echo "<td>".$row["send_time"]."</td>";
					echo "<td>".$row["pac_price"]."</td>";
					if($row["if_success"]<1)
					{
						echo "<td>未送達</td>";
					}
					else
					{
						echo "<td>送達</td>";
					}
					echo "<td>".$row["mem_id"]."</td></tr>";

				}

				echo "</table>";
				mysqli_close($link);
				?>
				</h2>

		</body>
</html>