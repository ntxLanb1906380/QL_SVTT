<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";

session_start();
$id = $_SESSION["idnv"];
?>

<?php

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


    // Validate input values, add errors if any
    // $errors = [];
    $errors = array();
    if (empty($hoten)) {
        array_push($errors, "Họ tên là bắt buộc");
    }
    if (empty($ngaysinh)) {
        array_push($errors, "Ngày sinh là bắt buộc");
    }
    if (empty($sdt)) {
        array_push($errors, "Số điện thoại là bắt buộc");
    }
    if (empty($diachi)) {
        array_push($errors, "Địa chỉ là bắt buộc");
    }
    if (empty($chucvu)) {
        array_push($errors, "Chức vụ là bắt buộc");
    }
    if (empty($email)) {
        array_push($errors, "Email là bắt buộc");
    }
    if (empty($gioitinh)) {
        array_push($errors, "Chưa chọn giới tính");
    }
    if (empty($maphongban)) {
        array_push($errors, "Mã phòng ban là bắt buộc");
    }

    // Check if phone number or email already exist in database, add error if any
    $sql = "SELECT * FROM nhanvien WHERE (sdt = ? OR email = ?)";
    $params = array($sdt, $email);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) { // Handle query error
        array_push($errors, "Database error: " . sqlsrv_errors()[0]['message']);
    } elseif (sqlsrv_has_rows($stmt)) { // Handle duplicate entry
        array_push($errors, "Số điện thoại hoặc email đã tồn tại trong hệ thống.");
        sqlsrv_free_stmt($stmt);
    } else {
        sqlsrv_free_stmt($stmt);
    }

    //cập nhật thông tin nhân viên
    $tsql = "UPDATE nhanvien SET hoten = ?, ngaysinh= ?, sdt= ?, diachi= ?, chucvu= ?, email= ?, gioitinh= ?, maphongban= ? WHERE id = ?";
    $param = array($hoten, $ngaysinh, $sdt, $diachi, $chucvu, $email, $gioitinh, $maphongban, $id);
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
            window.location.href = 'thtinNV.php?id=<?php echo $id ?>';
        </script>
        <?php
    }
    sqlsrv_close($conn);
}

?>
