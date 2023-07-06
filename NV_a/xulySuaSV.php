<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";
//lấy biến $msv từ session

session_start();
$msv = $_SESSION["mssv"];

// Check if form is submitted
if (isset($_POST['saveSV'])) {
    // Get input values
    $hoten = trim($_POST['hoten']);
    $ngaysinh = trim($_POST['ngsinh']);
    $diachi = trim($_POST['dchi']);
    $sdt = trim($_POST['sdt']);
    $email = trim($_POST['email']);
    $gioitinh = trim($_POST['gtinh']);

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
    $bangdiem = $_POST['bangdiem'];
    $bdiem = $_POST['bdiem'];
    $diemTB = trim($_POST['diemTB']);
    $idcb = trim($_POST['idcb']);
    $ndtt = trim($_POST['ndtt']);
    $kqtt = trim($_POST['kqtt']);

    //Khi thông tin bị trống lấy đường dẫn đã lưu trước đó trong csdl
    if (empty($bangdiem) && !(empty($bdiem))) {
        $bangdiem = $bdiem;
    } else {
    // Lưu file pdf bảng điểm vào thư mục bangdiemSV
    $upload_dir = '../bangdiemSV/';
    $bangdiem = [];
    if (isset($_FILES['bangdiem'])) {
        $bangdiem_name = $_FILES['bangdiem']['name'];
        $bangdiem_file = $upload_dir . $bangdiem_name;

        if (move_uploaded_file($_FILES['bangdiem']['tmp_name'], $bangdiem_file)) {
            $bangdiem = $bangdiem_file;
        } else {
            $errors[] = "Không thể tải lên bảng điểm.";
        }
    }
}


    // Check if phone number or email already exist in database, add error if any
    $csql = "SELECT * FROM sinhvien WHERE (sdt = ? OR email = ?)";
    $paramm = array($sdt, $email);
    $ststmt = sqlsrv_query($conn, $csql, $paramm);
    $errors = [];
    if ($ststmt === false) { // Handle query error
        array_push($errors, "Database error: " . sqlsrv_errors()[0]['message']);
    } elseif (sqlsrv_has_rows($ststmt)) { // Handle duplicate entry
        array_push($errors, "Số điện thoại hoặc email đã tồn tại trong hệ thống.");
        sqlsrv_free_stmt($ststmt);
    } else {
        // No error, continue
        sqlsrv_free_stmt($ststmt);
    }

    //cập nhật thông tin sinh viên
    $tsql = "UPDATE sinhvien SET hoten = ?, ngaysinh= ?, diachi= ?, sdt= ?, email= ?, gioitinh= ?, matruong= ?, makhoa= ?, bangdiem= ?, diemTB= ?, ketqua= ?, noidungTT= ?, id= ? WHERE mssv = ?";
    $params = array($hoten, $ngaysinh, $diachi, $sdt, $email, $gioitinh, $matruong, $makhoa, $bangdiem, $diemTB, $kqtt, $ndtt, $idcb, $msv);
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
            window.location.href = 'DSSV.php';
        </script>
        <?php
    }
}
sqlsrv_close($conn);
?>
