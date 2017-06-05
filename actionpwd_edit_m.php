<?php
    session_start();
    include("config.php");
	
    $id = $_POST["mem_id"];
    $OldPassword=$_POST["OldPassword"];
    $NewPassword=$_POST["NewPassword"];
    $NewPassword2=$_POST["NewPassword2"];

    
    $sql = "SELECT * FROM member WHERE mem_id = '".$id."' AND mem_password = '".$OldPassword."'";
    $result = mysqli_query($link, $sql);
    $total_records = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($total_records > 0) {
        if ($NewPassword == $NewPassword2) {
            $sql2="UPDATE member SET mem_password ='".$NewPassword."' WHERE mem_id ='".$id."'";
            $result2=mysqli_query($link,$sql2);
            $result2=mysqli_query($link,"SELECT*FROM member");
            echo "密碼更改成功 請重新登入";
            header("refresh:3;url = logout.php");
        }
        else {
            echo "新密碼不同!!!";
            header("refresh:3;url = list_m.php");
        }
    }
    else {
        echo "舊密碼錯誤!!!";
        header("refresh:3;url = list_m.php");
    }
?>