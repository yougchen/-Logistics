<?php

include("config.php");
session_start();

$account = $_POST["account"];
$password = $_POST["password"];

$sql = "SELECT * FROM member WHERE mem_account_num = '".$account."' AND mem_password = '".$password."'";
$result = mysqli_query($link, $sql);
$total_records = mysqli_num_rows($result);
if ($total_records > 0) {
    $_SESSION["login)session"] = true;
    echo "success";
} else {
    echo "fail";
}
