<?php
include "connect.php";
// Xử lý yêu cầu tìm kiếm
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // Truy vấn CSDL
    $sql = "SELECT * FROM sinhvien WHERE hoten LIKE '%$keyword%' OR mssv LIKE '%$keyword%' OR diachi LIKE '%$keyword%'";
    $stmt = sqlsrv_query($conn, $sql);

    // Hiển thị kết quả
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($stmt)) {
        echo "<table>";
        echo "<tr><th>MSSV</th><th>Tên sinh viên</th><th>Địa chỉ</th></tr>";
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo "<tr><td>".$row["mssv"]."</td><td>".$row["hoten"]."</td><td>".$row["diachi"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Không tìm thấy sinh viên nào.";
    }

    sqlsrv_free_stmt($stmt);
}

sqlsrv_close($conn);
?>
