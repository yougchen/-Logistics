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
smay {
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
      font-size: 20px; 
      font-family: 微軟正黑體;
      margin: 10px 10px 20px 10px;
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
      margin: 1px;
      padding: 0px;
    }

    a{
      text-decoration: none;
      background-color: black;
      color: white;
      font-size: 10px; 
      font-family: 微軟正黑體;
      margin: 10px 10px 10px 10px;
      padding: 0px 10px 0px 10px;
      
    }
    table, th, td {
    border: 1px solid black;
    }  

    table {
    border-collapse: collapse;
    width: 50%;
    margin: 0px 0px 0px -150px;
    }

    th, td {
      padding: 15px;
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
<h2>
            <a href="analysis_m.php?factor=寄送包裹種類分析">寄送包裹種類分析</a>

            <a href="analysis_m.php?factor=寄件地區數量分析">寄件地區數量分析</a>

            <a href="analysis_m.php?factor=收件地區數量分析">收件地區數量分析</a>
<h2/>
            

    <?php
if(isset($_POST["location"]))
{
   		header('Content-Type: text/html; charset=utf-8');
        session_start();
        include("config.php");
		
		mysqli_query($link,"SET NAMES 'UTF8'");

    	$location = $_POST["location"];

    	$sql = "SELECT * FROM invoice Where arrive_address like '%$location%'";

    	$result = mysqli_query($link, $sql);

        
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
        	echo "</tr>";
        }
        echo "</table>";

        mysqli_close($link);
       
        



}
?>

<body/>
<html/>