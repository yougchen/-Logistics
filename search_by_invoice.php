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
      echo "<th>包裹重量</th>";
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
        //刪除package
        $sql2="DELETE FROM package WHERE pac_id='$id' and inv_id = '$inv_id'";
      	$result=mysqli_query($link,$sql2) or die("刪除失敗");

		//判斷invoice內是否為0
		$result = mysqli_query($link, "SELECT count(*) FROM package WHERE inv_id = '$inv_id'");
		$row = mysqli_fetch_array($result,MYSQL_BOTH);

		$num = $row["count(*)"];
		if($num == 0){
			//刪除invoice
			$sql2 = "DELETE FROM invoice WHERE inv_id='$inv_id'";

			$result=mysqli_query($link,$sql2);
		}
		else{
		//算total price
			$sql3 = "SELECT SUM(pac_price) as total_price FROM package WHERE package.inv_id = '$inv_id' ";
			$result = mysqli_query($link,$sql3) or die("my sql select error");
			$row=mysqli_fetch_assoc($result);
			$total_price = $row["total_price"];
		//更新invoice;
			$sql4="UPDATE invoice SET total_price='$total_price' WHERE inv_id='$inv_id'";
			$result=mysqli_query($link,$sql4) or die("mysql update error");
		}

  	} else {

		mysqli_query($link,"SET NAMES 'UTF8'");
  		//判斷是否為修改功能
  		if(isset($_POST["pac_id"])){
			$package_type=$_POST["pac_type"];
			$length[]=$_POST["pac_length"];
			$width[]=$_POST["pac_width"];
			$height[]=$_POST["pac_height"];
			$weight[]=$_POST["pac_weight"];
			$delivery_method=$_POST["pac_delivery_method"];
			$pac_price=$_POST["pac_price"];
			$inv_id=$_POST["inv_id"];

			//改後
			$pac_id = $_POST["pac_id"];

			//未改前
			$pac_id1=$_POST["pac_id1"];
			//判斷是否相同
			if($pac_id == $pac_id1){

			}
			else{
				//判斷pac_id是否已有
				if(isset($_POST["pac_id"]) && $_POST["pac_id"] != ""){
					//改後
					$pac_id = $_POST["pac_id"];
					$sql = "SELECT count(*) FROM package WHERE inv_id = '$inv_id' and pac_id = '$pac_id'";
					$result = mysqli_query($link, $sql);
					$row = mysqli_fetch_assoc($result);
					$total_records = $row["count(*)"];
					//有資料
					if ($total_records > 0) {
						header("refresh:3;url=package_list.php");
						echo "<br />包裹編號已有";
						exit();
					}
				}
			}
			//運費對應，使用package_price_count.php要有的模板
			//常溫
			$price = array("60" => "130", "90" => "170", "120" => "210", "150" => "250");
			$K = array_keys($price);
			//低溫
			$price_cold = array("60" => "160", "90" => "225", "120" => "290");
			$K_cold = array_keys($price_cold);
			//經濟
			$price_cheap = array("5000" => "95");
			$K_cheap = array_keys($price_cheap);

			$array_num = 0;

			include("package_price_count.php");

		//更新package
			$sql2="UPDATE package 
				SET pac_id='$pac_id',pac_type='$package_type',pac_length='$length[$array_num]',pac_width='$width[$array_num]',pac_height='$height[$array_num]',pac_weight='$weight[$array_num]',pac_delivery_method='$delivery_method',pac_price='$pac_price',inv_id='$inv_id'
				WHERE pac_id='$pac_id1' and inv_id='$inv_id'";



			mysqli_query($link,$sql2) or die("update fall");
			//算total price
			$sql2 = "SELECT SUM(pac_price) as total_price FROM package WHERE package.inv_id = '$inv_id' ";
			$result = mysqli_query($link,$sql2) or die("my sql select error");
			$row=mysqli_fetch_assoc($result);
			$total_price = $row["total_price"];
			//更新invoice;
			$sql3="UPDATE invoice SET total_price='$total_price' WHERE inv_id='$inv_id'";
			$result=mysqli_query($link,$sql3) or die("mysql update error");
        
  		}
   	}
		  mysqli_query($link,"SET NAMES 'UTF8'");
		  $id=$_GET["inv_id"];

	echo "<div class = \"ptable\">
		  <h2>
	      	<a href = \"packagesend_m.php?inv_id=$id\">包裹新增</a>
	      </h2>
	      </div>";	
	
        
      $result = mysqli_query($link, "SELECT * FROM package where inv_id = '$id'");
      echo "<table border=1>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>包裹編號</th>";
      echo "<th>包裹品項</th>";
      echo "<th>包裹長度</th>";
      echo "<th>包裹寬度</th>";
      echo "<th>包裹高度</th>";
      echo "<th>包裹重量</th>";
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