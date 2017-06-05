<?php
session_start();

session_unset("$_SESSION[loginsession]");
header("location:login.php");

?>