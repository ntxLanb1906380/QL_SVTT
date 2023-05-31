<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="css/style2.css"> 
</head>
<body class = "c">

<form method="post" action="xulyDKy.php" class="form">

<h2>Tạo tài khoản nhân viên mới</h2>

Id: <input type="int" name="id" value="" required>

Mã nhân viên: <input type="varchar" name="mnv" value="" required/>

Họ tên: <input type="nvarchar" name="hoten" value="" required/>

Ngày sinh: <input type="date" name="ngsinh" value="" required>

Số điện thoại: <input type="char" name="sdt" value="" required/>

Địa chỉ: <input type="nvarchar" name="diachi" value="" required>

Chức vụ: <input type="nvarchar" name="chucvu" value="" required>

Email: <input type="varchar" name="email" value="" required>

Giới tính: <input type="nvarchar" name="gtinh" value="" required>

Mã phòng ban: <input type="int" name="mapb" value="" required>

Mật khẩu: <input type="password" name="pw" value="" required>

Nhập lại mật khấu: <input type="password" name="pw" value="" required>

<input type="submit" name="createNV" value="Tạo tài khoản"/>
<?php require 'xulyDKy.php';?>
</form>

</body>
</html>
