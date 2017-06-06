<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php session_start();?>
	<?php if (empty($_SESSION['loginsession'])) {
			echo "請先登入會員!!!";
			header("refresh:3;url = login.php");
			} else {
	?>
    <form action = "packagesend.php" method = "POST">
    寄件資料 <br>
    收件人姓名:<input type="text" name="rname" value=""><br>
    收件人電話:<input type="text" name="rphone" value=""><br>
    收件人信箱:<input type="text" name="remail" value=""><br>
    收件人地址:<input type="text" name="raddress" value=""><br>
    送出時間:<input type="date" name="rsend_time" value=""><br>
    請選擇你要選幾個包裹(<=20)<br/>

			<select name="number" >
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>


			</select>


    
    <input type="submit" name="submit" value="submit">
    </form>
<?php } ?>
    </body>
</html>