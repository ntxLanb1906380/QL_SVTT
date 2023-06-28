<!DOCTYPE html>
<html lang="vi-VN">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/style2.css">
</head>

<body class="c">
  <!-- Kết nối với csdl để lấy mã khóa -->
  <?php include "connect.php" ?>

  <h2>THÊM TRƯỜNG</h2>
  <!-- html không hỗ trọ int nên thay thế bằng number, không hỗ trợ varchar, char nên thay thế bằng text -->
  <form method="post" action="xulyThemKhoa.php" class="form">
    Mã khóa: <input type="text" name="maK" value="K" required class="d"><br />
    Thời gian BĐ: <input type="date" name="tgBD" value="" required class="d"><br />
    Thời gian KT: <input type="date" name="tgKT" value="" required class="d"><br />

    <br />
    <input type="submit" name="themKhoa" value="Thêm khóa mới" class="a" />
    <br />
    <input type="reset" name="reset" value="Reset" class="a" />
  </form>

</body>

</html>
