 <!--賬號管理-->
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

    	.menu{
      		text-align: center;
      		margin-bottom: 100px;      
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

		.joinORloginin{
			text-align: center;
		}

		.joinORloginin a{
			font-size: 30px;
			font-family: 微軟正黑體;
			color: blue;
			margin: 50px;
			padding: 20px;
			border: 2px dashed black;
			text-decoration: none;
		}

		.joinORloginin a:hover{
			color: lightseagreen;
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
		</div>

		<div class="joinORloginin">
 		<a href="join.php">加入會員</a>
 		<a href="loginin.php">登入會員</a></div>
		
		</body>

</html>