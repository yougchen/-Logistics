<?php

include("config.php");
session_start();

$account = $_POST["account"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE uacc = '".$account."' AND upass = '".$password."'";
$result = mysqli_query($link, $sql);
$total_records = mysqli_num_rows($result);
if ($total_records > 0) {
    $_SESSION["login)session"] = true;
    echo "success";
} else {
    echo "fail";
}
