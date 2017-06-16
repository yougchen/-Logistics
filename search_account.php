<!DOCTYPE html>
<html>
<head>
    <title>急速運送</title>
    <link rel="stylesheet" href="manager.css">

</head>

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
	echo "<br/><br/><h2>請先登入會員!!!</h2>";
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
	echo "<br/><br/><h2>權限不夠!!!</h2>";
	header("refresh:3;url = index.php");

	}
	else{?>
	<div class = "menu">
        <a href = "invoice_list.php">訂單管理</a>
   
        <a href = "package_list.php">包裹管理</a>
  
        <a href = "list_m.php">會員管理</a>
        
        <a href = "analysis_m.php">資料分析</a>

        <a href="index.php">首頁</a>

         <a href="logout.php">登出</a>         
    </div>
    <h2>
    	<div class = "analysis">
            <a href="analysis_m.php?factor=寄送包裹種類分析">寄送包裹種類分析</a>

            <a href="analysis_m.php?factor=寄件地區數量分析">寄件地區數量分析</a>

            <a href="analysis_m.php?factor=收件地區數量分析">收件地區數量分析</a>

			<a href="analysis_m.php?factor=會員分析">會員分析</a>
		</div>
    </h2>
            

	<div class = "analysis">
    <?php
if(isset($_POST["mem_gender"]))
{
        date_default_timezone_set("Asia/Taipei");
		
		mysqli_query($link,"SET NAMES 'UTF8'");

		$mem_gender = $_POST["mem_gender"];
		$mem_age = $_POST["age"];
		//算年齡對應的select_mem_birth
		$select_mem_birth=time();
  		for($n = 0; $n <= $mem_age; $n++){
	  		$select_mem_birth = strtotime("-1 year", $select_mem_birth );
	  	}
	  	//算出select_mem_birth下一年
  		$select_mem_birth_stage = strtotime("+1 year", $select_mem_birth );


  		//列出符合年齡的、性別的會員

		



		if($mem_gender === "男"||$mem_gender === "女"){

    		$sql = "SELECT * FROM member Where mem_gender like '%$mem_gender%'";

    	}
    	else if($mem_gender === "null"){

    		$sql = "SELECT * FROM member ";
    	}
    		
    		$result = mysqli_query($link, $sql);

          if ($result) {
    	    echo "<table border=1>";
    	    echo "<thead>";
    	    echo "<tr>";
    	    echo "<th>姓名</th>";
    	    echo "<th>電話</th>";
    	    echo "<th>地址</th>";
    	    echo "<th>信箱</th>";
    	    echo "<th>帳號</th>";
    	    echo "<th>密碼</th>";
    	    echo "<th>管理權限</th>";
    	    echo "<th>生日</th>";
    	    echo "<th>職業</th>";
    	    echo "<th>性別</th>";
    	    echo "</tr>";
    	    echo "</thead>";
    	    while($row = mysqli_fetch_assoc($result)){
    	    	if($_POST["age"] == ""){

				    echo "<tr>";
		    	   	echo "<td>";
				    echo $row["mem_name"];
		        	$id = $row["mem_id"];
		        	echo "</td><td>";
		        	echo $row["mem_phone"];
		        	echo "</td><td>";
		        	echo $row["mem_address"];
		            echo "</td><td>";
		   	    	echo $row["mem_email"];
		            echo "</td><td>";
		        	echo $row["mem_account_num"];
		            echo "</td><td>";
		   	    	echo $row["mem_password"];
		   	        echo "</td><td>";
		   	    	echo $row["manager_right"];
		   	        echo "</td><td>";
		   	    	echo $row["mem_birth"];
		   	        echo "</td><td>";
		   	    	echo $row["mem_career"];
		   	        echo "</td><td>";
		  	    	echo $row["mem_gender"];
		   	    	echo "</td>";
		      		echo "</tr>";
    	   		}
    	    	else{
			      	if( strtotime($row["mem_birth"]) >= $select_mem_birth && strtotime($row["mem_birth"]) < $select_mem_birth_stage){
				        echo "<tr>";
		    	    	echo "<td>";
				        echo $row["mem_name"];
		    	    	$id = $row["mem_id"];
		    	    	echo "</td><td>";
		    	    	echo $row["mem_phone"];
		    	    	echo "</td><td>";
		    	    	echo $row["mem_address"];
		    	        echo "</td><td>";
		    	    	echo $row["mem_email"];
		    	        echo "</td><td>";
		    	    	echo $row["mem_account_num"];
		    	        echo "</td><td>";
		    	    	echo $row["mem_password"];
		    	        echo "</td><td>";
		    	    	echo $row["manager_right"];
		    	        echo "</td><td>";
		    	    	echo $row["mem_birth"];
		    	        echo "</td><td>";
		    	    	echo $row["mem_career"];
		    	        echo "</td><td>";
		    	    	echo $row["mem_gender"];
		    	    	echo "</td>";
		        		echo "</tr>";
	        		}
	        	}
       		}
        	echo "</table>";
          } else {
            echo "No data";
          }

        


        mysqli_close($link);
    
}
	}
}
?>
	</div>
</body>
</html>