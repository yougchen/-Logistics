<?php
session_start();

include("config.php");

$rname = $_POST["rname"];
$rphone = $_POST["rphone"];
$remail = $_POST["remail"];
$raddress = $_POST["raddress"];
$rsend_time = $_POST["rsend_time"];
$package_type = $_POST["PackageType"];
$length = $_POST["length"];
$width = $_POST["width"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$delivery_method = $_POST["delivery_method"];


$sql = "INSERT INTO invoice (receiver_name, receiver_phone, receiver_email, arrive_address, send_time) VALUES ('".$rname."', '".$rphone."', '".$remail."', '".$raddress."', '".$rsend_time."')";
$sql2 = "INSERT INTO package (pac_type, pac_length, pac_width, pac_height, pac_weight, pac_delivery_method) VALUES ('".$package_type."', '".$length."', '".$width."', '".$height."', '".$weight."', '".$delivery_method."')";

$result = mysqli_query($link,$sql) or die("MySQL insert error");
$result = mysqli_query($link,$sql2) or die("MySQL insert error");

echo "表單已送出";
header("refresh:3;url = account.php");