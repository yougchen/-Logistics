<html>
<head>
</head>
<table>
<form action="sendform.php" method="post">
<?php 
$message = "
<title>送件資料</title>
<meta http-equiv="refresh" content="3; =b.html">
收件人姓名: $_POST[text]
收件人行動電話: $_POST[textfield2]
收件人Mail: $_POST[textfield3]
到件日期: $_POST[select]
到件地址: $_POST[textfield4]
到件時間: $_POST[textfield5]
遞件日期: $_POST[select]
總數: $_POST[textfield6]
";
mb_internal_encoding("UTF-8");
mb_send_mail(",", "", $message ,"From:send");
?>
</form>
</table>
</html>
