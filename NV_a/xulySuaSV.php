<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";
// $serverName = "LLANN";
// $database = "QL_SVTT";
// $uid = "";
// $pass = "";

// $conn = sqlsrv_connect($serverName, array(
//     "Database" => $database,
//     "Uid" => $uid,
//     "PWD" => $pass
// ));
?>

<?php

// Check if form is submitted
if (isset($_POST['saveSV'])) {
    // Get input values
    $mssv = trim($_POST['mssv']);
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
    $bangdiem = trim($_POST['bangdiem']);
    $diemTB = trim($_POST['diemTB']);
    $idcb = trim($_POST['idcb']);
    $ndtt = trim($_POST['ndtt']);
    $kqtt = trim($_POST['kqtt']);


    // Validate input values, add errors if any
    // $errors = [];
    $errors = array();
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
        array_push($errors, "Mã khóa là bắt buộc");
    }
    // if (empty($bangdiem)) {
    //     array_push($errors, "Bảng điểm là bắt buộc");
    // }
    // if (empty($diemTB)) {
    //     array_push($errors, "Điểm trung bình là bắt buộc");
    // }
    if (empty($idcb)) {
        array_push($errors, "Id cán bộ hướng dẫn là bắt buộc");
    }
    // if (empty($ndtt)) {
    //     array_push($errors, "Nội dung thực tập là bắt buộc");
    // }
    // if (empty($kqtt)) {
    //     array_push($errors, "Kết quả thực tập là bắt buộc");
    // }

    // Check if phone number or email already exist in database, add error if any
    $sql = "SELECT * FROM sinhvien WHERE (sdt = ? OR email = ?)";
    $params = array($sdt, $email);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) { // Handle query error
        array_push($errors, "Database error: " . sqlsrv_errors()[0]['message']);
    } elseif (sqlsrv_has_rows($stmt)) { // Handle duplicate entry
        array_push($errors, "Số điện thoại hoặc email đã tồn tại trong hệ thống.");
        sqlsrv_free_stmt($stmt);
    } else {
        // No error, continue
        sqlsrv_free_stmt($stmt);

        // Insert new student record into database 

    }
    $tsql = "UPDATE sinhvien SET hoten = ?, ngaysinh= ?, diachi= ?, sdt= ?, email= ?, gioitinh= ?, matruong= ?, makhoa= ?, bangdiem= ?, diemTB= ?, ketqua= ?, noidungTT= ?, id= ? WHERE mssv = ?";
    $param = array($hoten, $ngaysinh, $diachi, $sdt, $email, $gioitinh, $matruong, $makhoa, $bangdiem, $diemTB, $kqtt, $ndtt, $idcb, $mssv);
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
        header('Location: DSSV.php');
    }
}
sqlsrv_close($conn);
?>