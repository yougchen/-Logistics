<html>
<head>
<meta charset="utf-8">
送件資料</head>
<table>
<form action="sendform.php" method="post">
<?php 
$message = "
<title>送件表單</title>
<meta http-equiv=\"refresh\" content=\"3; =b.html\">
收件人姓名: $_POST['text']
收件人行動電話: $_POST['textfield2']
收件人Mail: $_POST['textfield3']
到件日期: <form action=\"\" method=\"post\">
    select_date :
    <input type=\"date\" value='<?= isset($_POST['get_date']) ? $_POST['get_date'] :''; ?>' name=\"get_date\"
                         min='<?= date('Y-m-d'); ?>'> ";  ?>
    
    <input type="submit" value="submit_date">
</form>

<?php
if (isset($_POST["get_date"])) {
    echo '<hr>' . 'get_date : ' . $_POST["get_date"];
}?>
到件地址: $_POST[textfield4]
到件時間: $_POST[textfield5]
遞件日期: <form action="" method="post">
    select_date :
    <input type="date" value="<?= isset($_POST['get_date']) ? $_POST['get_date'] : ''; ?>" name="get_date"
                         min="<?= date('Y-m-d'); ?>">
    <input type="submit" value="submit_date">
</form>

<?php
if (isset($_POST['get_date'])) {
    echo '<hr>' . 'get_date : ' . $_POST['get_date'];
}
總數: $_POST[textfield6]
;
mb_internal_encoding("UTF-8");
mb_send_mail(",", "", $message ,"From:send");
?>
</form>
</table>
</html>
