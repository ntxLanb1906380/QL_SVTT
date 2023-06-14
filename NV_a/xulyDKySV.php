<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php" ?>
<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";

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

    // Lưu file pdf bảng điểm vào thư mục uploads
    $upload_dir = '../bangdiemSV/';
    $bangdiem_name = $_FILES['bangdiem']['name'];
    $bangdiem_file = $upload_dir . $bangdiem_name;

    if (move_uploaded_file($_FILES['bangdiem']['tmp_name'], $bangdiem_file)) {
        $bangdiem = $bangdiem_file;
    } else {
        $errors[] = "Không thể tải lên bảng điểm.";
    }

    $diemTB = trim($_POST['diemTB']);
    $idcb = trim($_POST['idcb']);
    $ndtt = trim($_POST['ndtt']);
    $kqtt = trim($_POST['kqtt']);

    // Validate input values, add errors if any
    $errors = [];
    if (empty($mssv)) {
        array_push($errors, "Mã số sinh viên là bắt buộc");
    }
    if (empty($hoten)) {
        array_push($errors, "Họ tên là bắt buộc");
    }
    if (empty($ngaysinh)) {
        array_push($errors, "Ngày sinh là bắt buộc");
    }
    if (empty($diachi)) {
        array_push($errors, "Địa chỉ là bắt buộc");
    }
    if (empty($sdt)) {
        array_push($errors, "Số điện thoại là bắt buộc");
    }
    if (empty($email)) {
        array_push($errors, "Email là bắt buộc");
    }
    if (empty($gioitinh)) {
        array_push($errors, "Chưa chọn giới tính");
    }
    if (empty($matruong)) {
        array_push($errors, "Mã trường là bắt buộc");
    }
    if (empty($makhoa)) {
        array_push($errors, "Mã khóa thực tập là bắt buộc");
    }
    // if (empty($bangdiem)) {
    //     array_push($errors, "Bảng điểm là bắt buộc");
    // }
    // // if (
    if (empty($diemTB)) {
        array_push($errors, "Điểm trung bình là bắt buộc");
    }
    if (empty($idcb)) {
        array_push($errors, "Id cán bộ hướng dẫn là bắt buộc");
    }
    if (empty($ndtt)) {
        array_push($errors, "Nội dung thực tập là bắt buộc");
    }

    // Check if phone number or email already exist in database, add error if any
    $sql = "SELECT * FROM sinhvien WHERE mssv = ? OR sdt = ? OR email = ?";
    $params = array($mssv, $sdt, $email);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) { // Handle query error
        array_push($errors, "Database error: " . sqlsrv_errors()[0]['message']);
    } elseif (sqlsrv_has_rows($stmt)) { // Handle duplicate entry
        array_push($errors, "Mã số sinh viên, số điện thoại hoặc email đã tồn tại trong hệ thống.");
        sqlsrv_free_stmt($stmt);
    } else { // No error, continue
        sqlsrv_free_stmt($stmt);

        // Insert new employee record into database //(id, manv, hoten, ngaysinh, sdt, diachi, chucvu, email, gioitinh, maphongban, password)
        $sql = "INSERT INTO sinhvien(mssv, hoten, ngaysinh, diachi, sdt, email, gioitinh, matruong, makhoa, bangdiem, diemTB, ketqua, noidungTT, id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array($mssv, $hoten, $ngaysinh, $diachi, $sdt, $email, $gioitinh, $matruong, $makhoa, $bangdiem, $diemTB, $kqtt, $ndtt, $idcb);
        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt === false) { // Handle query error
            array_push($errors, "Database error: " . sqlsrv_errors()[0]['message']);
        } else {
            header('Location: DSSV.php');
        }

        if (isset($stmt) && !empty($stmt)) {
            sqlsrv_free_stmt($stmt);
        }
    }
    // If there is any error, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div class='error'>$error</div>";
            echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='createSV.php'>Thử lại</a>";
        }
    }
}
sqlsrv_close($conn);
?>