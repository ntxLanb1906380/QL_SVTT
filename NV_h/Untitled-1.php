<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";

//lấy biến $idnv từ session
session_start();
$id = $_SESSION["idnv"];

// Check if form is submitted
if (isset($_POST['updateMK'])) {
    // Get input values
    $matkhaucu = trim($_POST['old_pw']);
    $matkhaumoi = trim($_POST['new_pw']);
    $nl_matkhau = trim($_POST['renew_pw']);


    // Validate input values, add errors if any
    // $errors = [];
    $errors = array();
    if (empty($matkhaucu)) {
        array_push($errors, "Bắt buộc");
    }
    if (empty($matkhaumoi)) {
        array_push($errors, "Bắt buộc");
    }
    if (empty($nl_matkhau)) {
        array_push($errors, "Bắt buộc");
    }

    //Kiểm tra mật khẩu nhập vào
    if ($matkhaumoi != $nl_matkhau) {
        ?>
        <script>
            alert('Mật khẩu mới không trùng khớp nhau!');
            window.location.href = 'doiMK.php';
        </script>
        <?php
    }

    //Bam mat khau
    $hashedPassword_old = password_hash($matkhaucu, PASSWORD_ARGON2ID);
    $hashedPassword_new = password_hash($matkhaumoi, PASSWORD_ARGON2ID);
    $hashedPassword_re = password_hash($nl_matkhau, PASSWORD_ARGON2ID);

    //Kiểm tra mật khẩu cũ
    $sql = "SELECT matkhau FROM nhanvien WHERE id = ?";
    $params = array($id);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        $errors = sqlsrv_errors();
        echo "<div class='alert alert-danger'>";
        echo "<h4>Error:</h4>";
        foreach ($errors as $error) {
            echo "- " . $error['message'] . "<br>";
        }
        echo "</div>";
    } else {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if (!is_null($row)) {
            if ($hashedPassword_old != $row['matkhau']) {
                ?>
                <script>
                    alert('Mật khẩu cũ không đúng!');
                    window.location.href = 'doiMK.php';
                </script>
                <?php
                // echo "Mật khẩu cũ không đúng";
            } else {
                //Cập nhật mật khẩu mới
                $tsql = "UPDATE nhanvien SET matkhau= ? WHERE id = ?";
                $param = array($hashedPassword_new, $id);
                $result = sqlsrv_query($conn, $tsql, $param);
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
        }
    }
} else {
    echo "Không hoạt động";
}

?>