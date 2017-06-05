<?php

session_start();
include("config.php");

$id = $_GET["mem_id"];

$sql = "SELECT * FROM member WHERE mem_id = '". $id ."'";
$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $name = $row["mem_name"];
    $account_num = $row["mem_account_num"];
    $password = $row["mem_password"];
}

echo "<form action = 'actionpwd_edit_m.php' method = 'post'>";
echo "<input type = 'hidden' value = '$id' name = 'mem_id'>";
echo "姓名:" . $name . "<br/>";
echo "舊密碼:<input type = 'text' name = 'OldPassword'>請輸入舊密碼<br/>";
echo "新密碼:<input type = 'text' name = 'NewPassword'>請輸入新密碼<br/>";
echo "確認密碼:<input type = 'text' name = 'NewPassword2'>請再一次輸入新密碼<br/>";
echo "<input type = 'submit' name = 'submit'>";

?>