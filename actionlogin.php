
<?php
session_start();
include("config.php");


$account = $_POST["account"];
$password = $_POST["password"];

$sql = "SELECT * FROM member WHERE mem_account_num = '".$account."' AND mem_password = '".$password."'";
$result = mysqli_query($link, $sql);
$total_records = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
if ($total_records > 0) {
    if($row["manager_right"] == 0) {
       $_SESSION["login)session"] = $account;
       header("Location:list.php");
    } else {
        $_SESION["login)session"] = $account;
        header("Location:manager.php");
    }
} else {
    echo "fail";
}
?>