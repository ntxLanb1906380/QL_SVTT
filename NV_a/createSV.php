<!DOCTYPE html>
<html lang="vi-VN">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/style2.css">
</head>

<body class="c">
  <!-- Kết nối với csdl để lấy id sinhvien -->
  <?php include "connect.php" ?>
  <?php
  
  // Lấy id 
//   $max_ma_query = "SELECT MAX(mssv) AS max_ma FROM sinhvien;";
//   $result = sqlsrv_query($conn, $max_ma_query);
//   $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
//   $new_ma = $row['max_ma'] + 1;
//   $new_msv = strval($row['max_ma'] + 1);
//   // xét độ dài mã để thêm 0
//   if (strlen($new_msv) == 1) {
//     $new_msv = "0" . $new_msv;
//   }

//   $msv = "NV" . $new_msv;
  ?>

  <h2>Tạo tài khoản sinh viên mới</h2>
  <!-- html không hỗ trọ int nên thay thế bằng number, không hỗ trợ varchar, char nên thay thế bằng text -->
  <form method="post" action="xulyDKySV.php" class="form">

    <!-- Id: <input type="text" name="mssv" value="
    <?php 
    // echo $new_id; 
    ?>
    " required class="d"><br /> -->
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
        echo "<option value='" . $row['matruong'] . "'>" . $row['matruong'] ." - ". $row['tentruong'] . "</option>";
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
        echo "<option value='" . $row['makhoa'] . "'>" . $row['makhoa'] ." - ". $row['ngayBD']->format('d-m-Y')." - ". $row['ngayKT']->format('d-m-Y') . "</option>";
      }
      sqlsrv_free_stmt($stmt);
      ?>
    </select> <br /><br />
    Bảng điểm: <input type="text" name="bangdiem" value="" class="d"><br />
    Điểm trung bình: <input type="text" name="diemTB" value="" class="d"><br />
    Id cán bộ hướng dẫn: <br />
    <select id="idcb" name="idcb">
      <?php
      //Tạo câu truy vấn để lấy id cán bộ hướng dẫn
      $sql = "SELECT * FROM nhanvien";
      $stmt = sqlsrv_query($conn, $sql);
      if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
      }
      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row['id'] . "'>" . $row['id'] . " - " . $row['manv'] . " - " . $row['hoten'] . "</option>";
      }
      sqlsrv_free_stmt($stmt);
      ?>
    </select> <br /><br />
    
    Nội dung TT: <input type="text" name="ndtt" value="" class="d"><br />
    Kết quả TT: <input type="text" name="kqtt" value="" class="d">

    <br /><br />
    <input type="submit" name="createSV" value="Tạo tài khoản" class="a" />
		<br />
		<input type="reset" name="reset" value="Reset" class="a" />
    <?php require 'xulyDKySV.php'; ?>
  </form>

</body>

</html>
