<!DOCTYPE html>
<html lang="vi-VN">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/style2.css">
</head>

<body class="c">
  <!-- Kết nối với csdl để lấy id sinhvien -->
  <?php include "connect.php" ?>

  <h2>Tạo tài khoản sinh viên mới</h2>
  <!-- html không hỗ trọ int nên thay thế bằng number, không hỗ trợ varchar, char nên thay thế bằng text -->
  <form method="post" action="xulyDKySV.php" class="form" enctype="multipart/form-data">
    Mã sinh viên: <input type="text" name="msv" value="" required class="d"><br />
    Họ tên: <input type="text" name="hoten" value="" required class="d"><br />
    Ngày sinh: <input type="date" name="ngsinh" value="" required class="d"><br />
    Địa chỉ: <input type="text" name="diachi" value="" required class="d"><br />
    Số điện thoại: <input type="tel" name="sdt" value="" required class="d"><br />
    Email: <input type="email" name="email" value="" required class="d"><br />
    </select> <br /><br />

    Giới tính: <br />
    <input type="radio" id="gtinh1" name="gtinh" value="Nam" checked>
    <label for="html">Nam</label>
    <input type="radio" id="gtinh2" name="gtinh" value="Nữ">
    <label for="css">Nữ</label><br>

    Mã trường: <br />
    <select id="matruong" name="matruong">
      <?php
      //Tạo câu truy vấn để lấy mã trường
      $sql = "SELECT matruong, tentruong FROM truong";
      $stmt = sqlsrv_query($conn, $sql);
      if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
      }
      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row['matruong'] . "'>" . $row['matruong'] . " - " . $row['tentruong'] . "</option>";
      }
      sqlsrv_free_stmt($stmt);
      ?>
    </select> <br /><br />

    Mã khóa: <br />
    <select id="makhoa" name="makhoa">
      <?php
      //Tạo câu truy vấn để lấy mã khóa thực tập
      $sql = "SELECT * FROM khoaTT";
      $stmt = sqlsrv_query($conn, $sql);
      if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
      }
      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row['makhoa'] . "'>" . $row['makhoa'] . " ( " . $row['ngayBD']->format('d-m-Y') . " - " . $row['ngayKT']->format('d-m-Y') . " )</option>";
      }
      sqlsrv_free_stmt($stmt);
      ?>
    </select> <br /><br />
    Bảng điểm:
    <input type="file" name="bangdiem" accept="application/pdf"><br />

    Điểm trung bình: <input type="text" name="diemTB" value="" class="d" required ><br />
    <br />

    <input type="submit" name="createSV" value="Tạo tài khoản" class="a" />
    <br />
    <input type="reset" name="reset" value="Reset" class="a" />
    <?php require 'xulyDKySV.php'; ?>
  </form>

</body>

</html>
