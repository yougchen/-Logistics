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

    h4{
      text-align:left;
      font-size:18px;
      font-family:微軟正黑體;
      margin: 30px 10px 20px 10px;
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

</html>
<h4><?php
if ($_GET["factor"]=="常溫宅急便")
{	

	echo "商品服務介紹<br/>
	返鄉、旅遊、出差、開學放假等行李託運，365天全年無休<br/>
 
	常溫宅急便提供您寄送常溫物品（一般包裹、行李託運、送禮、飯店行李、託運、喜餅、電腦主機 <br/>、網拍、維修、shopping......等）的宅配託運服務。當日17點之前寄件，包裹隔日送達，是寄送包裹的最佳幫手。<br/>
	提供全台行李到府收送 <br/>
 
	提供全台行李到府收送，也可自行至全國連鎖代收店（7-ELEVEN、OK超商）等進行行李宅配託運。亦可在合作代收之飯店將行李寄送回家。<br/>
 
	受理包裹品項<br/>
	一般常溫包裹（一般包裹、行李託運、飯店行李託運、喜餅、電腦主機、網拍......等），尺寸在150公分以下(長+寬+高三邊合計)，20公斤以內。<br/>	";
}
if ($_GET["factor"]=="低溫宅急便")
{	
	
	echo "商品服務介紹<br/>
	冷藏冷凍新鮮配送最安心<br/>
 
	- 低溫分冷藏溫度0℃~7℃、冷凍溫度-15℃以下，您可視物品或包裹的特性，選擇不同溫層進行運送，最適合<br/>
	   想要宅配 海鮮、名特產美食、當令蔬果、月子餐的您，當日17點之前寄件，包裹隔日送達。 <br/>

	- 宅配前務必將低溫包裹預冷6小時至冷藏狀態，或12小時至冷凍狀態，且確認未漏水。<br/>

	 
	受理包裹品項<br/>
	一般低溫（冷藏、冷凍）包裹，尺寸在120公分以下，20公斤以內，宅配海鮮或美食也可以喔。<br/>
	";
	
}
if ($_GET["factor"]=="經濟宅急便")
{	
	
	echo "商品服務介紹<br/>
	附包材裝到滿、均一價95元<br/>
 
	- 經濟宅急便提供「附包材裝到滿、均一價95元」還可配合您的寄件需求將包材變化三種型態。<br/>
	
	- 當您有寄件需求時可先至7-ELEVEN、OK超商購買經濟宅急便專用包材，再拿到就近的7-ELEVEN、<br/>
	   OK超商門市寄出即可(可A店買B店寄)，超商門市24小時皆可銷售、寄件，方便您隨時想寄件的需求！ <br/>

	- 於7-ELEVEN、OK超商寄件時再加10元使用當日宅急便，台北市、新北市、基隆市、桃園市四地互寄當日<br/>
	  11時前交寄，就可當日配達，是您快遞之外的另一個好選擇。 <br/>

	- 本包材使用再生紙及大豆油墨印刷，致力於珍惜資源與環境保護。<br/>


	受理包裹品項<br/>
	經濟宅急便限寄常溫、5公斤以內物品。<br/>
	";
	
}
if ($_GET["factor"]=="當日宅急便")
{	
	echo "商品服務介紹<br/>
	今日寄 今日到 <br/>
 
	- 當日宅急便服務提供基隆市、台北市、新北市(註1)、桃園市(註2)	<br/>、新竹市、竹北市六地互寄，上午11點前寄件，當日快速到貨，宅配到家，是您快遞之外的另一種好選擇。 <br/>
 
	- 可與常溫宅急便、 低溫宅急便、 到付宅急便、 經濟宅急便一同使用。<br/>
 
	受理包裹品項<br/>
	一般常溫包裹，尺寸在150公分以下，20公斤以內。<br/>
	一般低溫（冷藏、冷凍）包裹，尺寸在120公分以下，20公斤以內。<br/>
	";
	
}
if ($_GET["factor"]=="到付宅急便")
{	
	echo "商品服務介紹<br/>
	收件人付費 <br/>
 
	- 到付宅急便提供您運費由收件人付款的方式，包裹送達時，黑貓宅急便人員向收件人收取運費，沒帶錢也可<br/>
	   寄，到付運費最便利。
 
	- 可與常溫宅急便、 低溫宅急便、 當日宅急便、 機場宅急便、 高爾夫宅急便(寄往球場不適用)一同使用。<br/>
 
	受理包裹品項<br/>
	一般常溫包裹（一般包裹、行李託運、飯店行李託運、喜餅、電腦主機、網拍......等），尺寸在150公分以下，20公斤以內。<br/>
	";
	
}
?><h4/>

