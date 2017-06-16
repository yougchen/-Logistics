<!--加入會員-->
<!DOCTYPE html>
<html>
<head>
    <title>急速運送</title>
    <link rel="stylesheet" href="normal.css">


</head>

    <body>
    <h1>急速快遞</h1> <br/>
    <div class="menu">
            <a href="Service.php">商品服務</a>

            <a href="send.php">寄件</a>
   
            <a href="recive.php">收件</a>

            <a href="search.php">查詢</a>
  
            <a href="account.php">帳號</a>

            <a href="index.php">首頁</a>
            
            <?php session_start(); ?>
            <?php if (empty($_SESSION["loginsession"])) { ?>
            <?php } else { ?>
            <a href="logout.php">登出</a>
            <?php } ?>
    </div>

</html>
<html>
<head>
	<title>包裹查詢</title>
</head>
		<body>
			<?php 

   				header('Content-Type: text/html; charset=utf-8');
        		include("config.php");
        		mysqli_query($link,"SET NAMES 'UTF8'");


				$inv_id=$_POST["inv_id"];

				$sql1="SELECT invoice.inv_id,receiver_name,receiver_phone,receiver_email,
				arrive_time,arrive_address,
				send_time,pac_price,if_success,mem_id
 				FROM package,invoice where package.inv_id=invoice.inv_id and invoice.inv_id='".$inv_id."'";

				$result=mysqli_query($link,$sql1);
				echo "<table border=1>";
				echo "<tr>
              <td>發票號碼</td>
              <td>收件人名稱</td>
              <td>收件人電話</td>
              <td>收件人mail</td>
              <td>到貨時間</td>
				      <td>送貨地址</td>
              <td>送貨時間</td>
              <td>總價格</td>
              <td>送貨成功/否</td>
              <td>會員編號</td>
              </tr>";
				while($row=mysqli_fetch_assoc($result)){
					echo "<tr><td>";
					echo $row["inv_id"]."</td>";
					echo "<td>".$row["receiver_name"]."</td>";
					echo "<td>".$row["receiver_phone"]."</td>";
					echo "<td>".$row["receiver_email"]."</td>";
					echo "<td>".$row["arrive_time"]."</td>";
					echo "<td>".$row["arrive_address"]."</td>";
					echo "<td>".$row["send_time"]."</td>";
					echo "<td>".$row["pac_price"]."</td>";
					if($row["if_success"]<1)
					{
						echo "<td>未送達</td>";
					}
					else
					{
						echo "<td>送達</td>";
					}
					echo "<td>".$row["mem_id"]."</td></tr>";

				}

				echo "</table>";
				mysqli_close($link);
				?>
				

		</body>
</html>