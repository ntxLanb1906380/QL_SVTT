<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style2.css">
	<meta charset="UTF-8">
	<title>
		Đặt lại mật khẩu
	</title>
</head>

<body>
	<!-- connect database -->
	<?php
    session_start();
    include "connect.php";
    $idnv = $_GET["id"];

    //lưu biến idnv vào session
    $_SESSION["idnv"] = $idnv;
    ?>
	
	<form method="post" action="xulyDatlaiMK.php" class="form">
		<h2>ĐẶT MẬT KHẨU MỚI</h2>

		ID nhân viên: 
		<?php echo $idnv  ?></br></br>

		Mật khẩu mới: 
        <input type="password" name="new_pw" value="" required class="d"><br />
		Nhập lại mật khẩu mới: 
        <input type="password" name="renew_pw" value="" required class="d"><br />
		<br /><br />

		<button name="datlaiMK" class="a">Đặt lại</button>
		<button type="reset" name="reset" class="a">Reset</button>
	</form>
</body>

</html>