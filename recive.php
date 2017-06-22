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

            <?php session_start(); ?>
            <?php if (empty($_SESSION["loginsession"])) { ?>
            <?php } else { ?>
            <a href="logout.php">登出</a>
            <?php } ?>
    </div>

<br/ >
<h3>
 配送預告
</h3>
<h4>
Q:到底什麼時候包裹才會寄到我家呢?<br/>
A:只要使用配送預告服務，包裹就會在送達前E-mail通知收件人
</h4>


<h3>
服務說明
</h3>
<h4>
登入會員後，只要在填完寄送表單後點選配送預告即可，我們便會在寄出後發送「配送預告」，告知收件人包裹預計送達的日期及時間。如未點選，不必擔心，我們急速快遞人員將會在送達前寄發email，讓收件人可以把事先知道，方便收件人收件。
</h4>
</body>
</html>

