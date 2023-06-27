<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";

//lấy biến $idnv từ session
session_start();
$id = $_SESSION["idnv"];

// Check if form is submitted
if (isset($_POST['datlaiMK'])) {
    // Get input values
    $matkhau = trim($_POST['new_pw']);
    $nl_matkhau = trim($_POST['renew_pw']);

    //Bam mat khau
    $hashedPassword = password_hash($matkhau, PASSWORD_ARGON2ID);

    // Check for invalid 
    if ($matkhau !== $nl_matkhau) {
        ?>
        <script>
            alert('Mật khẩu mới và mật khẩu nhập lại không trùng khớp!');
            // window.location.href = 'datlaiMK.php?id='.$id;
        </script>
        <?php
        $url = 'datlaiMK.php?id=' . $id;
        echo '<script>window.location.href="' . $url . '";</script>';

    } else {
        $sql = "UPDATE nhanvien SET matkhau= ? WHERE id = ?";
        $param = array($hashedPassword, $id);
        $result = sqlsrv_query($conn, $sql, $param);
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
                window.location.href = 'login.php';
            </script>
            <?php
        }
        sqlsrv_close($conn);

    }
} else {
    echo "Không hoạt động";
}

?>