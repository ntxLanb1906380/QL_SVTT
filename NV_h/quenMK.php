<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style2.css">
	<meta charset="UTF-8">
	<title>
		Quên mật khẩu
	</title>
</head>

<body>
	<!-- connect database -->
	<?php include "connect.php" ;?>

	<form method="post" action="xulyFormGoiNho.php" class="form">
		<h2>NHẬP THÔNG TIN GỢI NHỚ</h2>

        Id: 
        <input type="text" name="id" value="" required class="d"><br />

		Email/ Số điện thoại: <br />
        <input type="text" name="info" value="" required class="d">
        <br /><br />

		<button name="xulyFormGoiNho" class="a">Đặt lại mật khẩu</button>
	</form>
</body>

</html>