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
if(isset($_GET["factor"]))
{
    if($_GET["factor"]=="寄送包裹種類分析")
    {
    	echo "<form action = \"serch_pac_type_m.php\" method = \"POST\">
 		<select name=\"pac_type\">
    			<option value = '一般常溫用品'>一般常溫用品</option>
    			<option value = '低溫保鮮品'>低溫保鮮品</option>
    			<option value = '冷凍保鮮品'>冷凍保鮮品</option>
    			<option value = '易碎品'>易碎品</option>

    		</select>
    		<input type=\"submit\" name=\"submit\" value=\"submit\">";
    }
	
	if($_GET["factor"]=="收件地區數量分析")
    {
    	echo  "收件地區<form action = \"serch_receive_by_location_m.php\" method = \"POST\">
 		<select name=\"pac_type\">
    			<option value = '基隆市'>基隆市</option>
    			<option value = '台北市'>台北市</option>
    			<option value = '新北市'>新北市</option>
    			<option value = '桃園縣'>桃園縣</option>
    			<option value = '新竹市'>新竹市</option>
    			<option value = '新竹縣'>新竹縣</option>
    			<option value = '苗栗縣'>苗栗縣</option>
    			<option value = '台中市'>台中市</option>
    			<option value = '彰化縣'>彰化縣</option>
    			<option value = '南投縣'>南投縣</option>
    			<option value = '雲林縣'>雲林縣</option>
    			<option value = '嘉義市'>嘉義市</option>
    			<option value = '嘉義縣'>嘉義縣</option>
    			<option value = '台南市'>台南市</option>
    			<option value = '高雄市'>高雄市</option>
    			<option value = '屏東縣'>屏東縣</option>
    			<option value = '台東縣'>台東縣</option>
    			<option value = '花蓮縣'>花蓮縣</option>
    			<option value = '澎湖縣'>澎湖縣</option>
    			<option value = '金門縣'>金門縣</option>
    			<option value = '連江縣'>連江縣</option>

    		</select>
    		<input type=\"submit\" name=\"submit\" value=\"submit\"";
    }

    if($_GET["factor"]=="會員分析")
    {
    	echo  "<form action = \"analysis_m.php\" method = \"POST\">
 		<select name=\"pac_type\">
    			<option value = '一般常溫用品'>一般常溫用品</option>
    			<option value = '低溫保鮮品'>低溫保鮮品</option>
    			<option value = '冷凍保鮮品'>冷凍保鮮品</option>
    			<option value = '易碎品'>易碎品</option>

    		</select>
    		<input type=\"submit\" name=\"submit\" value=\"submit\"";
    }
    
    if($_GET["factor"]=="寄件地區數量分析")
    {
    	echo  "寄件地區<form action = \"serch_send_by_location_m.php\" method = \"POST\">
 		<select name=\"pac_type\">
    			<option value = '基隆市'>基隆市</option>
    			<option value = '台北市'>台北市</option>
    			<option value = '新北市'>新北市</option>
    			<option value = '桃園縣'>桃園縣</option>
    			<option value = '新竹市'>新竹市</option>
    			<option value = '新竹縣'>新竹縣</option>
    			<option value = '苗栗縣'>苗栗縣</option>
    			<option value = '台中市'>台中市</option>
    			<option value = '彰化縣'>彰化縣</option>
    			<option value = '南投縣'>南投縣</option>
    			<option value = '雲林縣'>雲林縣</option>
    			<option value = '嘉義市'>嘉義市</option>
    			<option value = '嘉義縣'>嘉義縣</option>
    			<option value = '台南市'>台南市</option>
    			<option value = '高雄市'>高雄市</option>
    			<option value = '屏東縣'>屏東縣</option>
    			<option value = '台東縣'>台東縣</option>
    			<option value = '花蓮縣'>花蓮縣</option>
    			<option value = '澎湖縣'>澎湖縣</option>
    			<option value = '金門縣'>金門縣</option>
    			<option value = '連江縣'>連江縣</option>

    		</select>
    		<input type=\"submit\" name=\"submit\" value=\"submit\"";
    }
}

?>
</body>
</html>

