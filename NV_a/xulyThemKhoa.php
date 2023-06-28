<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";

if (isset($_POST['themKhoa'])) {
    // Get input values
    $maKh = trim($_POST['maK']);
    $tgBDau = trim($_POST['tgBD']);
    $tgKThuc = trim($_POST['tgKT']);

    // Thêm khóa thực tập mới
    $sql = "INSERT INTO khoaTT(makhoa, ngayBD, ngayKT) VALUES (?, ?, ?)";
    $params = array($maKh, $tgBDau, $tgKThuc);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) { // Handle query error
        array_push($errors, "Database error: " . sqlsrv_errors()[0]['message']);
    } else {
        ?>
        <script>
            alert('Thêm thành công!');
            window.location.href = 'DSKhoaTT.php';
        </script>
        <?php
    }

    if (isset($stmt) && !empty($stmt)) {
        sqlsrv_free_stmt($stmt);
    }
}
// If there is any error, display them
if (!empty($errors)) {
    foreach ($errors as $error) {
        ?>
        <script>
            alert('Có lỗi xảy ra. Vui lòng thử lại!');
            window.location.href = 'DSKhoaTT.php';
        </script>
        <?php
    }
}
sqlsrv_close($conn);
?>