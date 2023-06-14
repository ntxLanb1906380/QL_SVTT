<!DOCTYPE html>
<html lang="vi-VN">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/style2.css">
</head>

<body class="c">
  <!-- Kết nối với csdl để lấy id sinhvien -->
  <?php include "connect.php" ?>
<table>
    <thead>
        <tr>
            <th>Mã SV</th>
            <th>Họ và tên</th>
            <th>Bảng điểm</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Lấy danh sách sinh viên từ CSDL và hiển thị
        $sql = "SELECT * FROM sinhvien";
        $stmt = sqlsrv_query($conn, $sql);
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['mssv'] . "</td>";
            echo "<td>" . $row['hoten'] . "</td>";
            echo "<td><a href='" . $row['bangdiem'] . "'>Xem bảng điểm</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>
