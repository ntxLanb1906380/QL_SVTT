<!DOCTYPE html>
<html lang="vi-VN">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/style2.css">
</head>

<body class="c">
  <!-- Kết nối với csdl để lấy mã trường -->
  <?php include "connect.php" ?>

  <h2>THÊM TRƯỜNG</h2>
  <!-- html không hỗ trọ int nên thay thế bằng number, không hỗ trợ varchar, char nên thay thế bằng text -->
  <form method="post" action="xulyThemTruong.php" class="form">
    Mã trường: <input type="text" name="mtr" value="" required class="d"><br />
    Tên trường: <input type="text" name="tentruongqed" value="" required class="d"><br />

    <br />
    <input type="submit" name="themTruong" value="Thêm trường mới" class="a" />
    <br />
    <input type="reset" name="reset" value="Reset" class="a" />
  </form>

</body>

</html>
