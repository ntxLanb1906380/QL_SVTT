<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style2.css">
	<meta charset="UTF-8">
	<title>
		Đổi mật khẩu
	</title>
</head>

<body>
	<!-- connect database -->
	<?php include "connect.php" ;

	//lấy biến $idnv từ session
    // session_start();
    // $id = $_SESSION["idnv"];
	?>

	<form method="post" action="xulyDoiMK.php" class="form">
		<h2>ĐỔI MẬT KHẨU</h2>

		Mật khẩu cũ: 
        <input type="password" name="old_pw" value="" required class="d"><br />
		Mật khẩu mới: 
        <input type="password" name="new_pw" value="" required class="d"><br />
		Nhập lại mật khẩu mới: 
        <input type="password" name="renew_pw" value="" required class="d"><br />
		<br /><br />

        <a href="quenMK.php">Quên mật khẩu?</a>
		<button name="updateMK" class="a">Cập nhật</button>
		<button type="reset" name="reset" class="a">Reset</button>
	</form>
</body>

</html>