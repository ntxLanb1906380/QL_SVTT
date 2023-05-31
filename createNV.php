<!DOCTYPE html>
<html lang="vi-VN">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style2.css"> 
</head>
<body class = "c">

<?php
$serverName = "LLANN";
$database = "QL_SVTT";
$uid = "";
$pass = "";

$conn = sqlsrv_connect($serverName, array(
    "Database" => $database,
    "Uid" => $uid,
    "PWD" => $pass
));

$max_id_query = "SELECT MAX(id) AS max_id FROM nhanvien;";
$result = sqlsrv_query($conn, $max_id_query);
$row = sqlsrv_fetch_array($result);
$new_id = $row['max_id'] + 1;
?>

<!-- <form method="post" action="xulyDKy.php" class="form">

<h2>Tạo tài khoản nhân viên mới</h2>
//html không hỗ trọ int nên thay thế bằng number, không hỗ trợ varchar, char nên thay thế bằng text
Id: <input type="int" name="id" value="<?php echo $new_id; ?>" required>
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
</form> -->

<form method="post" action="xulyDKy.php" class="form">

  <h2>Tạo tài khoản nhân viên mới</h2>

  Id: <input type="number" name="id" value="<?php echo $new_id; ?>" required>
  Mã nhân viên: <input type="text" name="mnv" value="" required />
  Họ tên: <input type="text" name="hoten" value="" required />
  Ngày sinh: <input type="date" name="ngsinh" value="" required>
  Số điện thoại: <input type="tel" name="sdt" value="" required />
  Địa chỉ: <input type="text" name="diachi" value="" required>
  Chức vụ: <input type="text" name="chucvu" value="" required>
  Email: <input type="email" name="email" value="" required>
  Giới tính: <input type="text" name="gtinh" value="" required>
  Mã phòng ban: <input type="number" name="mapb" value="" required>
  Mật khẩu: <input type="password" name="pw" value="" required>
  Nhập lại mật khẩu: <input type="password" name="pw" value="" required>

  <input type="submit" name="createNV" value="Tạo tài khoản" />
  <?php require 'xulyDKy.php';?>
  
</form>


</body>
</html>
