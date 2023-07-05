
<?php
include "connect.php";

// Lấy giá trị từ URL (GET)
$mssv = $_GET['mssv']; 
$id = $_GET['id']; 

// Cập nhật giá trị vào database
$sql = "UPDATE sinhvien SET id = ? WHERE mssv = ?";
$params = array($id, $mssv);
$stmt = sqlsrv_query($conn, $sql, $params);

// Kiểm tra kết quả truy vấn
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    // Đóng kết nối database
    sqlsrv_close($conn);

    // Chuyển hướng người dùng đến trang DShuongdanSV.php
    header("Location: DShuongdanSV.php");
    exit();
}
?>
