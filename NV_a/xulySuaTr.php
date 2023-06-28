<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";
session_start();
$mtr = $_SESSION["matr"];

// Check if form is submitted
if (isset($_POST['saveTr'])) {
    // Get input values
    $tentr = trim($_POST['tentruong']);

    //cập nhật thông tin sinh viên
    $sql = "UPDATE truong SET tentruong = ? WHERE matruong = ?";
    $params = array($tentr, $mtr);
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
            window.location.href = 'DStruong.php';
        </script>
        <?php
    }
}
sqlsrv_close($conn);
?> 