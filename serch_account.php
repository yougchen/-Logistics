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
      font-size: 50px; 
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
      font-size: 10px;
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
      background-color: white;
      color: black;
      font-size: 15px; 
      font-family: 微軟正黑體;
      margin: 10px 10px 10px 10px;
      padding: 8px 20px 8px 20px;
    }
</style>

</head>

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

            <a href="analysis_m.php?factor=寄送包裹種類分析">寄送包裹種類分析</a>

            <a href="analysis_m.php?factor=寄件地區數量分析">寄件地區數量分析</a>

            <a href="analysis_m.php?factor=收件地區數量分析">收件地區數量分析</a>

            <a href="analysis_m.php?factor=會員分析">會員分析</a>

    <?php
if(isset($_POST["mem_gender"]))
{
   		header('Content-Type: text/html; charset=utf-8');
        session_start();
        include("config.php");
        date_default_timezone_set("Asia/Taipei");
		
		mysqli_query($link,"SET NAMES 'UTF8'");

		$mem_gender = $_POST["mem_gender"];
		$mem_age = $_POST["age"];
		echo $mem_age."<br/>";
		//算年齡

		$result = mysqli_query($link, "SELECT mem_birth FROM member ");


		$now=time();
		$nowdate=getdate($now);
		$end=mktime(0,0,0,1,1,2018);//設定世界末日最後時間
		$enddate=getdate($end);
		$dingdong=$enddate["0"]-$nowdate["0"];//結束時間
		$second=($dingdong%60);
		$minute=(($dingdong-$second)/60);
		$hour=(($minute-$minute%60)/60);
		$day=(($hour-$hour%24)/24);

		echo $day."日".($hour%24)."時".($minute%60)."分".$second."秒";

		while($row_age = mysqli_fetch_assoc($result)){

			$change = time()-strtotime($row_age["mem_birth"]);

			echo $change."<br/>";
			$daychange=$change/(60*60*24);

			(int)$age=(int)$daychange/365;

			echo $daychange."<br/>";

			echo $age."<br/>";


		}

		$now = date("Y-m-j H:i:s");

		echo $mem_gender;

		if($mem_gender === "男"||$mem_gender === "女"){

    		$sql = "SELECT * FROM member Where mem_gender like '%$mem_gender%'";

    	}
    	else if($mem_gender === "null"){

    		$sql = "SELECT * FROM member ";
    	}
    		
    		$result = mysqli_query($link, $sql);

    	    echo "<table border=1>";
    	    echo "<thead>";
    	    echo "<tr>";
    	    echo "<th>姓名</th>";
    	    echo "<th>電話</th>";
    	    echo "<th>地址</th>";
    	    echo "<th>信箱</th>";
    	    echo "<th>帳號</th>";
    	    echo "<th>密碼</th>";
    	    echo "<th>管理權限</th>";
    	    echo "<th>生日</th>";
    	    echo "<th>職業</th>";
    	    echo "<th>性別</th>";
    	    echo "</tr>";
    	    echo "</thead>";
    	    while($row = mysqli_fetch_assoc($result)){
		        echo "<tr>";
    	    	echo "<td>";
		        echo $row["mem_name"];
    	    	$id = $row["mem_id"];
    	    	echo "</td><td>";
    	    	echo $row["mem_phone"];
    	    	echo "</td><td>";
    	    	echo $row["mem_address"];
    	        echo "</td><td>";
    	    	echo $row["mem_email"];
    	        echo "</td><td>";
    	    	echo $row["mem_account_num"];
    	        echo "</td><td>";
    	    	echo $row["mem_password"];
    	        echo "</td><td>";
    	    	echo $row["manager_right"];
    	        echo "</td><td>";
    	    	echo $row["mem_birth"];
    	        echo "</td><td>";
    	    	echo $row["mem_career"];
    	        echo "</td><td>";
    	    	echo $row["mem_gender"];
    	    	echo "</td>";
        		echo "</tr>";
       		}
        	echo "</table>";

        


        mysqli_close($link);
        



}
?>