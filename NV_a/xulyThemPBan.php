<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";

if (isset($_POST['themPBan'])) {
    // Get input values
    $mpb = trim($_POST['mpban']);
    $tenpb = trim($_POST['tenpban']);
    $pbcha = trim($_POST['mpbcha']);
    if ($pbcha == "null") {
        $pbcha = null; 
    }


    // Insert new record into database 
    $sql = "INSERT INTO phongban (maphongban, tenphongban, phongbancha) VALUES (?, ?, ?)";
    $params = array($mpb, $tenpb, $pbcha);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) { // Handle query error
        ?>
        <script>
            alert('Có lỗi xảy ra. Vui lòng thử lại!');
            window.location.href = 'themPBan.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Thêm thành công!');
            window.location.href = 'DSphongban.php';
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
            window.location.href = 'themPBan.php';
        </script>
        <?php
    }
}
sqlsrv_close($conn);
?>