<!--加入會員-->
<!DOCTYPE html>
<html>
<head>
    <title>急速運送</title>
    <link rel="stylesheet" href="normal.css">

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

  <?php
   //連結資料庫
    $link=@mysql_connect(
        'localhost',
        'root',
        '123456',
        'logistics');

    //開啟資料庫
    $db = mysql_select_db("logistics", $link);

    echo "<form method=\"post\" name=\"form\"action=\"normal.php\" onClick=\"return check\" accept-charset=\"utf-8\">";
    echo "帳號名稱：<input type='text' name='mem_account_num' required maxlength='15' pattern='.{6,}'>";
    echo "<span style= 'font-size:15px;'>(只能輸入A-Z,a-z,0-9, 至少6個字, 不超過15個字)</span><br>";
    echo "姓名：<input type='text' name='mem_name' required maxlength='15'>";
    echo "<span style= 'font-size:15px;'>(只能輸入A-Z,a-z,0-9, 至少6個字, 不超過15個字)</span><br>";
    echo "密碼：<input type='password' name='mem_password' required pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' maxlength='10'>";
    echo "<span style= 'font-size:15px;'>(要包含至少1個數字1個大寫字母和1個小寫字母,至少6個字, 不超過10個字)</span><br>";
    echo "生日：<input type='date' name='mem_birth' required value='mem_birth'><br>";
    echo "性別：<input type='radio' name='mem_gender' required value='男'>男
          <input type='radio' name='mem_gender' value='女'>女 <br>";
    echo "電話：<input type='tel' name='mem_phone'  required placeholder='09xxxxxxxx' pattern='.{9,}' maxlength='10'>";
    echo "<span style= 'font-size:15px;>'(至少9個字, 最多只能輸入10個字）</span><br>";
    echo "Email：<input type='email' name='mem_email' required placeholder='example@mail.com' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$'><br>";
    echo "地址：<input type='text' name='mem_address' required maxlength='35'>";
    echo "<span style= 'font-size:15px;'>(不超過35字)</span><br>";
    echo "職業：&nbsp;<input type='radio' name='mem_career' required value='醫護人員'>醫護人員 
          <input type='radio' name='mem_career' value='政府官員'>政府官員
          <input type='radio' name='mem_career' value='教師'>教師 <br>
          &emsp;&emsp;&emsp;
          <input type='radio' name='mem_career' value='工程師'>工程師
          <input type='radio' name='mem_career' value='商人'>商人
          <input type='radio' name='mem_career' value='學生'>學生 <br>
          &emsp;&emsp;&emsp;
          <input type='radio' name='mem_career' value='家庭主婦'>家庭主婦
          <input type='radio' name='mem_career' value='其他'>其他<br>";
    echo "<input type='reset' value='重設'>";
    echo "<input type='submit' name='button' id='button' value='註冊會員' onClick='check()'>";
    echo "</form>";
    ?>

    </body>

</html>