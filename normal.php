<!--普通會員申請-->
<!DOCTYPE html>
<html>
<head>
  <title>急速運送</title>
   <link rel="stylesheet" href="normal.css">

</head>

    <body>
    <h1>急速快遞</h1> <br/>
    <div class = "menu">
            <a href = "Service.php">商品服務</a>

            <a href = "send.php">寄件</a>
   
            <a href = "recive.php">收件</a>

            <a href = "search.php">查詢</a>
  
            <a href = "account.php">帳號</a>

            <a href="index.php">首頁</a>
    </div>


    <?php

    header('Content-Type: text/html; charset=utf-8');
    //連結資料庫
    $link=@mysql_connect(
        'localhost',
        'root',
        '123456',
        'logistics');

     mysql_query("SET NAMES 'UTF8'");

    //開啟資料庫
    $db = mysql_select_db("logistics", $link);
    $mem_account_num = $_POST['mem_account_num'];
    $mem_name = $_POST['mem_name'];
    $mem_password = $_POST['mem_password'];
    $mem_birth = $_POST['mem_birth'];
    $mem_gender = $_POST['mem_gender'];
    $mem_phone = $_POST['mem_phone'];
    $mem_email = $_POST['mem_email'];
    $mem_address = $_POST['mem_address'];
    $mem_career = $_POST['mem_career'];
  
    $queryStr = "INSERT into member(mem_id, mem_name, mem_phone, mem_address, mem_email, mem_account_num, mem_password, manager_right, mem_birth, mem_career, mem_gender)
        
        values (NULL, '$mem_name', '$mem_phone', '$mem_address', '$mem_email', '$mem_account_num', '$mem_password', '0',  '$mem_birth', '$mem_career', '$mem_gender')";

           mysql_query ($queryStr,$link) or die ('<br/> 加入失敗');

    
    echo "<h2 style= 'font-size:30px; text-align:center; margin:0 auto; margin-top:30px;' >- - - - 歡迎加入會員 - - - -</h2>";
    echo "<br>";
    echo "<p style= 'font-size:20px; margin: 10px;'>賬號："; 
    echo $_POST["mem_account_num"];
    echo "</p><br>";
    echo "<p style= 'font-size:20px; margin: 10px;'>姓名："; 
    echo $_POST["mem_name"];
    echo "</p><br>";
    echo "<p style= 'font-size:20px; margin: 10px;'>密碼："; 
    echo $_POST["mem_password"];
    echo "</p><br>";
    echo "<p style= 'font-size:20px; margin: 10px;'>生日："; 
    echo $_POST["mem_birth"];
    echo "</p><br>";
    echo "<p style= 'font-size:20px; margin: 10px;'>性別："; 
    echo $_POST["mem_gender"];
    echo "</p><br>";
    echo "<p style= 'font-size:20px; margin: 10px;'>電話："; 
    echo $_POST["mem_phone"];
    echo "</p><br>";
    echo "<p style= 'font-size:20px; margin: 10px;'>Email："; 
    echo $_POST["mem_email"];
    echo "</p><br>";
    echo "<p style= 'font-size:20px; margin: 10px;'>地址："; 
    echo $_POST["mem_address"];
    echo "</p><br>";
    echo "<p style= 'font-size:20px; margin: 10px; margin-bottom: 50px;'>職業："; 
    echo $_POST["mem_career"];
    echo "</p><br>";

    mysql_close($link);

    echo "<a href=login.php style='border:1px solid black; background-color:black; color:white; margin:10px 10px 10px 200px; padding: 8px 20px 8px 20px; '>登入賬號</a>";
    echo "<a href=account.php style='border:1px solid black; background-color:black; color:white; margin:10px; padding: 8px 20px 8px 20px;'>返回賬號頁</a>";
    ?>

    </body>
    
</html>