<?php
include "connect.php";

// Lấy giá trị được gửi lên từ client
$mssv = $_POST["mssv"];
$noidungTT = $_POST["noidungTT"];
$ketqua = $_POST["ketqua"];

// Lưu giá trị vào database
$sql = "UPDATE sinhvien SET noidungTT = ?, ketqua = ? WHERE mssv = ?";
$params = array($noidungTT, $ketqua, $mssv);
$stmt = sqlsrv_query($conn, $sql, $params);

// Kiểm tra kết quả
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "success";
}
sqlsrv_free_stmt($stmt);
?>
