<!--加入會員-->
<!DOCTYPE html>
<html>
<head>
    <title>急速運送</title>
    <link rel="stylesheet" href="manager.css">

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
    </div>
<?php
	echo "<br/><br/>請先登入會員!!!";
	header("refresh:3;url = login.php");
} else {
$account = $_SESSION["loginsession"];

//判斷是否為管理者
$sql = "SELECT manager_right FROM member WHERE mem_account_num = '$account'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
	   if($row["manager_right"] == 0) { ?>
	   <div class = "menu">
            <a href="Service.php">商品服務</a>

            <a href="send.php">寄件</a>
   
            <a href="recive.php">收件</a>

            <a href="search.php">查詢</a>
  
            <a href="account.php">帳號</a>

            <a href="logout.php">登出</a>
       </div>
<?php
  
      mysqli_query($link,"SET NAMES 'UTF8'");
      $id=$_GET["inv_id"];
        
      $result = mysqli_query($link, "SELECT * FROM package where inv_id = '$id'");
      echo "<table border=1>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>包裹編號</th>";
      echo "<th>包裹品項</th>";
      echo "<th>包裹長度</th>";
      echo "<th>包裹寬度</th>";
      echo "<th>包裹高度</th>";
      echo "<th>包裹運送方式</th>";
      echo "<th>寄件方式</th>";
      echo "<th>金額</th>";
      echo "<th>訂單編號</th>";
      echo "</tr>";
      echo "</thead>";
        while($row = mysqli_fetch_assoc($result)){
           echo "<tr>";
           echo "<td>";
           echo $row["pac_id"];
           $id = $row["pac_id"];
           echo "</td><td>";
           echo $row["pac_type"];
           echo "</td><td>";
           echo $row["pac_length"];
           echo "</td><td>";
           echo $row["pac_width"];
           echo "</td><td>";
           echo $row["pac_height"];
           echo "</td><td>";
           echo $row["pac_weight"];
           echo "</td><td>";
           echo $row["pac_delivery_method"];
           echo "</td><td>";
           echo $row["pac_price"];
           echo "</td><td>";
           echo $row["inv_id"];
           $inv_id = $row["inv_id"];
           echo "</td>";
           echo "</tr>";
        }
      echo "</table>";

      mysqli_close($link);
      }
     else {?>
     <div class = "menu">
        <a href = "invoice_list.php">訂單管理</a>
   
        <a href = "package_list.php">包裹管理</a>
  
        <a href = "list_m.php">會員管理</a>
        
        <a href = "analysis_m.php">資料分析</a>

        <a href="index.php">首頁</a>

         <a href="logout.php">登出</a>         
    </div>


    
	<div class = "analysis_table">
    

      <?php
    //判斷是否為刪除功能
	if(isset($_GET["pac_id"])){
          $id = $_GET["pac_id"];
          $inv_id = $_GET["inv_id"];
          $sql2="DELETE FROM package WHERE pac_id='$id' and inv_id = '$inv_id'";

      $result=mysqli_query($link,$sql2) or die("刪除失敗");
  	} else {

		mysqli_query($link,"SET NAMES 'UTF8'");
  		//判斷是否為修改功能
  		if(isset($_POST["pac_id"])){
  			$pac_id=$_POST["pac_id"];
			$pac_type=$_POST["pac_type"];
			$pac_length=$_POST["pac_length"];
			$pac_width=$_POST["pac_width"];
			$pac_height=$_POST["pac_height"];
			$pac_weight=$_POST["pac_weight"];
			$pac_delivery_method=$_POST["pac_delivery_method"];
			$pac_price=$_POST["pac_price"];
			$inv_id=$_POST["inv_id"];


			$sql2="UPDATE package SET pac_id='$pac_id',pac_type='$pac_type',pac_length='$pac_length',pac_width='$pac_width',pac_height='$pac_height',pac_weight='$pac_weight',pac_delivery_method='$pac_delivery_method',pac_price='$pac_price',inv_id='$inv_id'WHERE pac_id='$pac_id' and inv_id='$inv_id'";

			mysqli_query($link,$sql2) or die("update fall");
  		}
   	}	
		
		  mysqli_query($link,"SET NAMES 'UTF8'");
		  $id=$_GET["inv_id"];
        
      $result = mysqli_query($link, "SELECT * FROM package where inv_id = '$id'");
      echo "<table border=1>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>包裹編號</th>";
      echo "<th>包裹品項</th>";
      echo "<th>包裹長度</th>";
      echo "<th>包裹寬度</th>";
      echo "<th>包裹高度</th>";
      echo "<th>包裹運送方式</th>";
      echo "<th>寄件方式</th>";
      echo "<th>金額</th>";
      echo "<th>訂單編號</th>";
      echo "<th>刪除</th>";
      echo "<th>資料修改</th>";
      echo "</tr>";
      echo "</thead>";
        while($row = mysqli_fetch_assoc($result)){
	         echo "<tr>";
           echo "<td>";
	         echo $row["pac_id"];
	         $id = $row["pac_id"];
        	 echo "</td><td>";
        	 echo $row["pac_type"];
        	 echo "</td><td>";
        	 echo $row["pac_length"];
        	 echo "</td><td>";
        	 echo $row["pac_width"];
          	 echo "</td><td>";
        	 echo $row["pac_height"];
        	 echo "</td><td>";
        	 echo $row["pac_weight"];
           	 echo "</td><td>";
           	 echo $row["pac_delivery_method"];
           	 echo "</td><td>";
        	 echo $row["pac_price"];
           	 echo "</td><td>";
        	 echo $row["inv_id"];
             $inv_id = $row["inv_id"];
        	 echo "</td>";
        	 echo "<td>";
        	 echo "<a href = 'search_by_invoice.php?pac_id=$id&inv_id=$inv_id'>delete</a>";
        	 echo "</td>";
        	 echo "<td>";
        	 echo "<a href = 'pupdate_m.php?factor=invoice&pac_id=$id&inv_id=$inv_id'>modify</a>";
        	 echo "</td>";
        	 echo "</tr>";
        }
      echo "</table>";

      mysqli_close($link);
      
    }
}    
?>
	</div>
    </body>
</html>