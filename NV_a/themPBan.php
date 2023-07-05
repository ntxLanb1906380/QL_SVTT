<!DOCTYPE html>
<html lang="vi-VN">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/style2.css">
</head>

<body class="c">
  <!-- Kết nối với csdl để lấy mã trường -->
  <?php include "connect.php";

  // Lấy id 
  $max_mpb_query = "SELECT MAX(maphongban) AS max_mpb FROM phongban;";
  $result = sqlsrv_query($conn, $max_mpb_query);
  $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

  $new_mpb = $row['max_mpb'] + 1;
  ?>

  <h2>THÊM PHÒNG BAN/ TỔ MỚI</h2>
  <!-- FORM THÊM PHÒNG BAN..... -->
  <form method="post" action="xulyThemPBan.php" class="form">
    Mã phòng ban: <input type="text" name="mpban" value="<?php echo $new_mpb ?>" required class="d"><br />
    Tên phòng ban/ tổ: <input type="text" name="tenpban" value="" required class="d"><br />
    <br />
    Phòng ban cha:
    <select id="mpbcha" name="mpbcha">
      <option value=null>Chọn phòng ban cha</option>
      <?php
      $sql = "SELECT * FROM phongban";
      $stmt = sqlsrv_query($conn, $sql);
      if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
      }
      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        if ($row['phongbancha'] === null) {
        echo "<option value='" . $row['maphongban'] . "'>" . $row['maphongban'] . " - " . $row['tenphongban'] . "</option>";
        }
      }
      sqlsrv_free_stmt($stmt);
      ?>
    </select>


    <br />
    <input type="submit" name="themPBan" value="Thêm phòng ban/ tổ mới" class="a" />
    <br />
    <input type="reset" name="reset" value="Reset" class="a" />
  </form>

</body>

</html>