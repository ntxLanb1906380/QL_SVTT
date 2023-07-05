<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";

//lấy biến $mPB từ session
session_start();
$mPB = $_SESSION["maPB"];

// Check if form is submitted
if (isset($_POST['savePB'])) {
    // Get input values
    $tenPB = trim($_POST['tenpb']);
    $pbcha = trim($_POST['pbcha']);
    if ($pbcha == "null") {
        $pbcha = null; 
    }

    //cập nhật thông tin phòng ban
    $tsql = "UPDATE phongban SET tenphongban = ?, phongbancha= ? WHERE maphongban = ?";
    $params = array($tenPB, $pbcha, $mPB);
    $result = sqlsrv_query($conn, $tsql, $params);
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
            window.location.href = 'DSphongban.php';
        </script>
        <?php
    }
}
sqlsrv_close($conn);
?> 