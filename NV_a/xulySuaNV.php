<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";

session_start();
$idcbhd = $_SESSION["idnvhd"];

// Check if form is submitted
if (isset($_POST['saveNV'])) {
    // Get input values
    $hoten = trim($_POST['hoten']);
    $ngaysinh = trim($_POST['ngsinh']);
    $sdt = trim($_POST['sdt']);
    $diachi = trim($_POST['dchi']);
    $chucvu = trim($_POST['chucvu']);
    $email = trim($_POST['email']);
    $gioitinh = trim($_POST['gtinh']);
    //Check gioi tinh

    if (isset($_POST['gtinh'])) {
        if ($_POST['gtinh'] == "Nam") {
            $gioitinh = "Nam";
        } elseif ($_POST['gtinh'] == "Nữ") {
            $gioitinh = "Nữ";
        } else {
            $errors[] = "Lỗi.";
        }
    } else {
        $errors[] = "Chưa chọn giới tính.";
    }


    $maphongban = trim($_POST['mapb']);
    $matkhau = trim($_POST['pwd']);
    $passw = trim($_POST['pw']);

    $errors = [];
    // Check if phone number or email already exist in database, add error if any
    $sql = "SELECT * FROM nhanvien WHERE (sdt = ? OR email = ?)";
    $params = array($sdt, $email);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) { // Handle query error
        // Sử dụng array_push để thêm thông báo lỗi vào mảng errors
        array_push($errors, "Database error: " . sqlsrv_errors()[0]['message']);
    } elseif (sqlsrv_has_rows($stmt)) { // Handle duplicate entry
        array_push($errors, "Số điện thoại hoặc email đã tồn tại trong hệ thống.");
        sqlsrv_free_stmt($stmt);
    } else {
        // No error, continue
        sqlsrv_free_stmt($stmt);
    }
    
    //cập nhật thông tin nhân viên
    if ($matkhau !== null) {
        $hashedPassword = password_hash($matkhau, PASSWORD_ARGON2ID);
        $tsql = "UPDATE nhanvien SET hoten = ?, ngaysinh= ?, sdt= ?, diachi= ?, chucvu= ?, email= ?, gioitinh= ?, maphongban= ?, matkhau= ? WHERE id = ?";
        $param = array($hoten, $ngaysinh, $sdt, $diachi, $chucvu, $email, $gioitinh, $maphongban, $hashedPassword, $idcbhd);
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
            header('Location: DSNV.php');
        }
        sqlsrv_close($conn);
    }
    else {
        $matkhau = $passw;
    }
}

?>
