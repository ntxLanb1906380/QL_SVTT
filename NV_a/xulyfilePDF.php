<?php
if (isset($_POST['createSV'])) {
    // Get input values
    $mssv = trim($_POST['msv']);
    $hoten = trim($_POST['hoten']);
    $ngaysinh = trim($_POST['ngsinh']);
    $diachi = trim($_POST['diachi']);
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
    $bangdiem = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // lấy tên file
        $fileName = $_FILES['pdfFile']['name'];
        // đường dẫn tạm thời file trên server
        $tmpPath = $_FILES['pdfFile']['tmp_name'];
        // Check if file was uploaded successfully
        if (isset($_FILES['pdfFile']) && $_FILES['pdfFile']['error'] === UPLOAD_ERR_OK) {
            // lấy tên file
            $fileName = $_FILES['pdfFile']['name'];
            // đường dẫn tạm thời file trên server
            $tmpPath = $_FILES['pdfFile']['tmp_name'];
            // nếu file được upload thành công
            if (move_uploaded_file($tmpPath, 'uploads/' . $fileName)) {
                $bangdiem = $fileName;
                echo 'File uploaded successfully';
            } else {
                echo 'Error moving file';
            }
        } else {
            echo 'No file uploaded or file upload error. Error code: ' . $_FILES['pdfFile']['error'];
        }
    }
    $diemTB = trim($_POST['diemTB']);
    $idcb = trim($_POST['idcb']);
    $ndtt = trim($_POST['ndtt']);
    $kqtt = trim($_POST['kqtt']);

    // Validate
}
?>