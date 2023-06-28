<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";
session_start();
$mKh = $_SESSION["maK"];

// Check if form is submitted
if (isset($_POST['saveKh'])) {
    // Get input values
    $ngayBD = trim($_POST['ngBD']);
    $ngayKT = trim($_POST['ngKT']);

    //cập nhật thông tin khóa thực tập
    $sql = "UPDATE khoaTT SET ngayBD = ?, ngayKT = ? WHERE makhoa = ?";
    $params = array($ngayBD, $ngayKT, $mKh);
    $result = sqlsrv_query($conn, $sql, $params);
    if ($result === false) {
        $errors = sqlsrv_errors();
        echo "<div class='alert alert-danger'>";
        echo "<h4>Error:</h4>";
        foreach ($errors as $error) {
            echo "- " . $error['message'] . "<br>";
            var_dump($result);
        }
        echo "</div>";
    } else {
        ?>
        <script>
            alert('Cập nhật thành công!');
            window.location.href = 'DSKhoaTT.php';
        </script>
        <?php
    }
}
sqlsrv_close($conn);
?> 