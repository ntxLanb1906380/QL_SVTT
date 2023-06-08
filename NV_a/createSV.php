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
      <option value="0">-- Chọn mã trường của sinh viên</option>
      <option value="CTU"> CTU - Trường Đại học Cần Thơ</option>
      <option value="DVL"> DVL - Trường Đại học Văn Lang</option>
      <option value="DVT"> DVT - Trường Đại học Trà Vinh</option>
      <option value="TTG"> TTG - Trường Đại học Tiền Giang</option>
    </select> <br /><br />

    Mã khóa: <br />
    <select id="makhoa" name="makhoa">
      <option value="0">-- Chọn mã khóa thực tập</option>
      <option value="K1"> K1</option>
      <option value="K2"> K2</option>
      <option value="K3"> K3</option>
      <option value="K4"> K4</option>
    </select> <br /><br />
    Bảng điểm: <input type="text" name="bangdiem" value="" class="d"><br />
    Điểm trung bình: <input type="text" name="diemTB" value="" class="d"><br />
    Id cán bộ hướng dẫn: <input type="text" name="idcb" value="" required class="d"><br />
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
