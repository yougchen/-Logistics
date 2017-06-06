<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?session_start();?>
    <form action = "actionsend.php" method = "POST">
    寄件資料 <br>
    收件人姓名:<input type="text" name="rname" value=""><br>
    收件人電話:<input type="text" name="rphone" value=""><br>
    收件人信箱:<input type="text" name="remail" value=""><br>
    收件人地址:<input type="text" name="raddress" value=""><br>
    送出時間:<input type="date" name="rsend_time" value=""><br>
    ===================================================<br>
    包裹資料 <br>
    包裹類型:<input type="radio" name="PackageType" value="1" checked = "True">一般常溫用品
    <input type="radio" name="PackageType" value="2">低溫保鮮品
    <input type="radio" name="PackageType" value="3">冷凍保鮮品
    <input type="radio" name="PackageType" value="4">易碎品 <br>
    包裹長度:<input type="text" name="length" value=""><br>
    包裹寬度:<input type="text" name="width" value=""><br>
    包裹高度:<input type="text" name="height" value=""><br>
    包裹重量:<input type="text" name="weight" value=""><br>
    運送方式:<input type="radio" name="delivery_method" value="1" checked = "True">一般寄件
             <input type="radio" name="delivery_method" value="2">急件 <br>
    
    <input type="submit" name="submit" value="submit">
    </form>

    </body>
</html>