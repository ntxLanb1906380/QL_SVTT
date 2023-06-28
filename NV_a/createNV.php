<!DOCTYPE html>
<html lang="vi-VN">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/style2.css">
</head>

<body class="c">
  <!-- Kết nối với csdl để lấy id nhanvien -->
  <?php include "connect.php" ?>
  <?php

  // Lấy id 
  $max_id_query = "SELECT MAX(id) AS max_id FROM nhanvien;";
  $result = sqlsrv_query($conn, $max_id_query);
  $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

  $new_id = $row['max_id'] + 1;
  $new_mnv = strval($row['max_id'] + 1);
  // xét độ dài id để thêm 0
  if (strlen($new_mnv) == 1) {
    $new_mnv = "0" . $new_mnv;
  }

  $mnv = "NV" . $new_mnv;
  ?>

  <h2>Tạo tài khoản nhân viên mới</h2>
  <!-- html không hỗ trọ int nên thay thế bằng number, không hỗ trợ varchar, char nên thay thế bằng text -->
  <form method="post" action="xulyDKyNV.php" class="form">

    Id: <input type="text" name="id" value="<?php echo $new_id; ?>" required class="d"><br />
    Mã nhân viên: <input type="text" name="mnv" value="<?php echo $mnv; ?>" required class="d"><br />
    Họ tên: <input type="text" name="hoten" value="" required class="d"><br />
    Ngày sinh: <input type="date" name="ngsinh" value="" required class="d"><br />
    Số điện thoại: <input type="tel" name="sdt" value="" required class="d"><br />
    Địa chỉ: <input type="text" name="diachi" value="" required class="d"><br />
    Chức vụ: <br />

    <select id="chucvu" name="chucvu">
      <option value="0">-- Chọn chức vụ của nhân viên</option>
      <option value="Nhân viên admin"> Nhân viên admin</option>
      <option value="Nhân viên"> Nhân viên</option>
      <option value="Phó giám đốc"> Phó giám đốc</option>
      <option value="Giám đốc"> Giám đốc</option>
    </select> <br /><br />

    Email: <input type="email" name="email" value="" required class="d"><br />

    Giới tính: <br />

    <input type="radio" id="gtinh1" name="gtinh" value="Nam" checked>
    <label for="html">Nam</label>
    <input type="radio" id="gtinh2" name="gtinh" value="Nữ">
    <label for="css">Nữ</label><br>

    Mã phòng ban:<select id="mapb" name="mapb">
      <?php
      //Tạo câu truy vấn để lấy mã phòng ban
      $sql = "SELECT maphongban, tenphongban FROM phongban";
      $stmt = sqlsrv_query($conn, $sql);
      if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
      }
      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row['maphongban'] . "'>" . $row['maphongban'] ." - ". $row['tenphongban'] . "</option>";
      }
      sqlsrv_free_stmt($stmt);
      ?>
    </select> <br /><br /> 
    
    Mật khẩu: <input type="password" name="pw" value="" required class="d"><br />
    Nhập lại mật khẩu: <input type="password" name="cf_pw" value="" required class="d"><br />
    <br /><br />
    <input type="submit" name="createNV" value="Tạo tài khoản" class="a" />
    <br />
    <input type="reset" name="reset" value="Reset" class="a" />
  </form>

</body>

</html>
