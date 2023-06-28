<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";

if (isset($_POST['themTruong'])) {
    // Get input values
    $matr = trim($_POST['mtr']);
    $tentr = trim($_POST['tentruong']);

    // Insert new employee record into database //(id, manv, hoten, ngaysinh, sdt, diachi, chucvu, email, gioitinh, maphongban, password)
    $sql = "INSERT INTO truong(matruong, tentruong) VALUES (?, ?)";
    $params = array($matr, $tentr);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) { // Handle query error
        array_push($errors, "Database error: " . sqlsrv_errors()[0]['message']);
    } else {
        ?>
        <script>
            alert('Thêm thành công!');
            window.location.href = 'DStruong.php';
        </script>
        <?php
        // header('Location: DStruong.php');
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
            window.location.href = 'DStruong.php';
        </script>
        <?php
        // echo "<div class='error'>$error</div>";
        // echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='themTruong.php'>Thử lại</a>";
    }
}
sqlsrv_close($conn);
?>