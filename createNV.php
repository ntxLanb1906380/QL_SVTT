<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="style2.css"/> 
</head>
<body class="a">

<form method="post" action="xulyDKy.php" class="form">

<h2>Tạo tài khoản nhân viên mới</h2>

Id: <input type="text" name="id" value="" required>

Mã nhân viên: <input type="text" name="mnv" value="" required/>

Họ tên: <input type="text" name="hoten" value="" required/>

Ngày sinh: <input type="text" name="ngsinh" value="" required>

Số điện thoại: <input type="text" name="sdt" value="" required/>

Địa chỉ: <input type="text" name="diachi" value="" required>

Chức vụ: <input type="text" name="chucvu" value="" required>

Email: <input type="text" name="email" value="" required>

Giới tính: <input type="text" name="gtinh" value="" required>

Mã phòng ban: <input type="text" name="mapb" value="" required>

Mật khẩu: <input type="password" name="pw" value="" required>

Nhập lại mật khấu: <input type="password" name="pw" value="" required>

<input type="submit" name="createNV" value="Tạo tài khoản"/>
<?php require 'xulyDKy.php';?>
</form>

</body>
</html>