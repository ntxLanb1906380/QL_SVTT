<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php" ;

if (isset($_POST['createSV'])) {
    // Get input values
    $mssv = trim($_POST['msv']);
    $hoten = trim($_POST['hoten']);
    $ngaysinh = trim($_POST['ngsinh']);
    $diachi = trim($_POST['diachi']);
    $sdt = trim($_POST['sdt']);
    $email = trim($_POST['email']);

    //Check gioi tinh
    if (isset($_POST['gtinh'])) {
        if ($_POST['gtinh'] == "Nam") {
            $gioitinh = "Nam";
        } elseif ($_POST['gtinh'] == "Nữ") {
            $gioitinh = "Nữ";
        } else {
            $errors[] = "Không chọn đúng giới tính.";
        }
    } else {
        $errors[] = "Chưa chọn giới tính.";
    }

    $matruong = trim($_POST['matruong']);
    $makhoa = trim($_POST['makhoa']);

    // Lưu file pdf bảng điểm vào thư mục bangdiemSV
    $upload_dir = '../bangdiemSV/';
    $bangdiem_name = $_FILES['bangdiem']['name'];
    $bangdiem_file = $upload_dir . $bangdiem_name;

    if (move_uploaded_file($_FILES['bangdiem']['tmp_name'], $bangdiem_file)) {
        $bangdiem = $bangdiem_file;
    } else {
        $errors[] = "Không thể tải lên bảng điểm.";
    }

    $diemTB = trim($_POST['diemTB']);
    // $idcb = trim($_POST['idcb']);
    // $ndtt = trim($_POST['ndtt']);
    // $kqtt = trim($_POST['kqtt']);

    // Check if phone number or email already exist in database, add error if any
    $sql = "SELECT * FROM sinhvien WHERE mssv = ? OR sdt = ? OR email = ?";
    $param = array($mssv, $sdt, $email);
    $stmt = sqlsrv_query($conn, $sql, $param);
    if ($stmt === false) { // Handle query error
        array_push($errors, "Database error: " . sqlsrv_errors()[0]['message']);
    } elseif (sqlsrv_has_rows($stmt)) { // Handle duplicate entry
        array_push($errors, "Mã số sinh viên, số điện thoại hoặc email đã tồn tại trong hệ thống.");
        sqlsrv_free_stmt($stmt);
    } else { // No error, continue
        sqlsrv_free_stmt($stmt);

        // Insert new employee record into database //(id, manv, hoten, ngaysinh, sdt, diachi, chucvu, email, gioitinh, maphongban, password)
        $tsql = "INSERT INTO sinhvien(mssv, hoten, ngaysinh, diachi, sdt, email, gioitinh, matruong, makhoa, bangdiem, diemTB)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array($mssv, $hoten, $ngaysinh, $diachi, $sdt, $email, $gioitinh, $matruong, $makhoa, $bangdiem, $diemTB);
        $ststmt = sqlsrv_query($conn, $tsql, $params);
        if ($ststmt === false) { // Handle query error
            array_push($errors, "Database error: " . sqlsrv_errors()[0]['message']);
        } else {
            ?>
            <script>
                alert('Thêm sinh viên thành công!');
                window.location.href = 'DSSV.php';
            </script>
            <?php
            // header('Location: DSSV.php');
        }

        if (isset($ststmt) && !empty($ststmt)) {
            sqlsrv_free_stmt($ststmt);
        }
    }
    // If there is any error, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            ?>
            <script>
                alert('Có lỗi xảy ra trong quá trình đăng ký!');
                window.location.href = 'createSV.php';
            </script>
            <?php
            // echo "<div class='error'>$error</div>";
            // echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='createSV.php'>Thử lại</a>";
        }
    }
}
sqlsrv_close($conn);
?>
