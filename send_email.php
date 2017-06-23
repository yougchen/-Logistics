<!--加入會員-->
<!DOCTYPE html>
<html>
<head>
    <title>急速運送</title>
    <link rel="stylesheet" href="normal.css">

</head>

    <body>
    <h1>急速快遞</h1> <br/>
    <?php
header('Content-Type: text/html; charset=utf-8');
include("config.php");
session_start();
//判斷是否已登入
if (empty($_SESSION["loginsession"])) { ?>
	<div class = "menu">
            <a href="Service.php">商品服務</a>

            <a href="send.php">寄件</a>
   
            <a href="recive.php">收件</a>

            <a href="search.php">查詢</a>
  
            <a href="account.php">帳號</a>

            <a href="index.php">首頁</a>
    </div>
<?php
	echo "<br/><br/><h2>請先登入會員!!!</h2>";
	header("refresh:3;url = login.php");
} else {
	//判斷從哪裡傳來的
	if(isset($_GET["inv_id"])&&isset($_GET["factor"])&&$_GET["factor"]=="manager"){
		?>
	<div class = "menu">
        <a href = "invoice_list.php">訂單管理</a>
   
        <a href = "package_list.php">包裹管理</a>
  
        <a href = "list_m.php">會員管理</a>
        
        <a href = "analysis_m.php">資料分析</a>

        <a href="index.php">首頁</a>

         <a href="logout.php">登出</a>         
    </div>
<?php
	}else if(isset($_GET["inv_id"])){
?>

	   <div class = "menu">
            <a href="Service.php">商品服務</a>

            <a href="send.php">寄件</a>
   
            <a href="recive.php">收件</a>

            <a href="search.php">查詢</a>
  
            <a href="account.php">帳號</a>

        	<a href="index.php">首頁</a>

            <a href="logout.php">登出</a>
       </div>
<?php
	}
if(isset($_GET["inv_id"])){
	mysqli_query($link,"SET NAMES 'UTF8'");
	$inv_id = $_GET["inv_id"];
	//取郵件所需資料
	$sql = "SELECT inv_id, receiver_name, receiver_email,arrive_time, member.mem_id, member.mem_name from invoice, member where member.mem_id = invoice.mem_id AND inv_id = '$inv_id'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);

	$receiver_name = $row["receiver_name"];
	$receiver_email = $row["receiver_email"];
	$arrive_time = $row["arrive_time"];
	$mem_id = $row["mem_id"];
	$mem_name = $row["mem_name"];
	$inv_id = $row["inv_id"];
	//取現在時間
	date_default_timezone_set("Asia/Taipei");
	$now = time();
	$now = date("Y-m-d H:i:s", $now);

	$sql = "SELECT count(*) from package where inv_id = '$inv_id'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);
	$number = $row["count(*)"];


	if(isset($_GET["factor"])&&$_GET["factor"]=="manager"){
		
		$content = "您好，這裡是急速快遞，您有急速快遞會員編號：".$mem_id."
		名稱：".$mem_name." 所寄送的訂單。編號是：".$inv_id."，內有".$number."個包裹。包裹現在正運往您的地點，現在是".$now."。預計在".$arrive_time."送到。特此提醒，祝您有一個美好的一天。 PS:這是系統通知不須回復。
		";
		$sql2="UPDATE invoice SET if_success = 1 WHERE inv_id='$inv_id'";
		mysqli_query($link,$sql2) or die("mysql send error");
	}
	else {
		$content = "您好，這裡是急速快遞，您有急速快遞會員編號：".$mem_id."
		名稱：".$mem_name." 所寄送的訂單。編號是：".$inv_id."，內有".$number."個包裹。將會於".$arrive_time."送到。特此提醒，祝您有一個美好的一天。 PS:這是系統通知不須回復。
		";
	}

	include("PHPMailer-master\PHPMailerAutoload.php"); //匯入PHPMailer類別       

	$mail= new PHPMailer(); //建立新物件        
	$mail->IsSMTP(); //設定使用SMTP方式寄信        
	$mail->SMTPAuth = true; //設定SMTP需要驗證        
	$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線   
	$mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機        
	$mail->Port =465;  //Gamil的SMTP主機的SMTP埠位為465埠。        
	$mail->CharSet = "utf8"; //設定郵件編碼        

	$mail->Username = "speedsendperson@gmail.com"; //設定驗證帳號        
	$mail->Password = "speedsendperson1234567890"; //設定驗證密碼        

	$mail->From ="speedsendperson@gmail.com";//設定寄件者信箱        
	$mail->FromName = "急速快遞"; //設定寄件者姓名        

	$mail->Subject = "寄送預告"; //設定郵件標題        
	$mail->Body = $content; //設定郵件內容        
	$mail->IsHTML(true); //設定郵件內容為HTML 
	$mail->AddAddress($receiver_email, $receiver_name); //設定收件者郵件及名稱 
	if(!$mail->Send()) {        
	echo "<h2>Mailer Error</h2> ";        
	} else {
		if(isset($_GET["factor"])&&$_GET["factor"]=="manager"){

			header("refresh:1;url=invoice_list.php");
			echo "<h2>信已送出!</h2";  
		}
		else{

			header("refresh:3;url=index.php");
			echo "<h2>信已送出!</h2";  
		}      
	}  
}		


}?>