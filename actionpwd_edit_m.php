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
      font-size: 20px; 
      font-family: 微軟正黑體;
      margin: 0px -800px 0px 50px;
      padding: 0px 10px 0px 10px

    }
    table{
        border:0;
        width:700px;
    }

    tr { 
        border-bottom:1px solid; 
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

<h2>
<?php
    session_start();
    include("config.php");
	
    $id = $_POST["mem_id"];
    $OldPassword=$_POST["OldPassword"];
    $NewPassword=$_POST["NewPassword"];
    $NewPassword2=$_POST["NewPassword2"];

    
    $sql = "SELECT * FROM member WHERE mem_id = '".$id."' AND mem_password = '".$OldPassword."'";
    $result = mysqli_query($link, $sql);
    $total_records = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($total_records > 0) {
        if ($NewPassword == $NewPassword2) {
            $sql2="UPDATE member SET mem_password ='".$NewPassword."' WHERE mem_id ='".$id."'";
            $result2=mysqli_query($link,$sql2);
            $result2=mysqli_query($link,"SELECT*FROM member");
            echo "密碼更改成功 請重新登入";
            header("refresh:3;url = logout.php");
        }
        else {
            echo "新密碼不同!!!";
            header("refresh:3;url = list_m.php");
        }
    }
    else {
        echo "舊密碼錯誤!!!";
        header("refresh:3;url = list_m.php");
    }
?>
<<<<<<< HEAD
</h2>
</body>
</html>
=======
<h2/>
<html/>
>>>>>>> 9ff2ffdda469e39d43f7faf7fd63be7eec7fc5f9
