<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
  include "connect.php" ?>
<?php
// Check if form is submitted
if(isset($_POST['createNV'])){
    // Get input values
    $id = trim($_POST['id']);
    $manv = trim($_POST['mnv']);
    $hoten = trim($_POST['hoten']);
    $ngaysinh = trim($_POST['ngsinh']);
    $sdt = trim($_POST['sdt']);
    $diachi = trim($_POST['diachi']);
    $chucvu = trim($_POST['chucvu']);
    $email = trim($_POST['email']);
    $gioitinh = trim($_POST['gtinh']);
    //Check gioi tinh
        if(isset($_POST['gtinh'])){
            if($_POST['gtinh'] == "Nam") {
                $gioitinh = "Nam";
            } elseif ($_POST['gtinh'] == "Nữ") {
                $gioitinh = "Nữ";
            } else {
                $errors[] = "Không chọn đúng giới tính.";
            }
        } else {
            $errors[] = "Chưa chọn giới tính.";
        }
    $maphongban = trim($_POST['mapb']);
    $matkhau = trim($_POST['pw']);

    // Validate input values, add errors if any
    $errors = [];
    if(empty($id)) { array_push($errors, "Id là bắt buộc"); }
    if(empty($manv)) { array_push($errors, "Mã nhân viên là bắt buộc"); }
    if(empty($hoten)) { array_push($errors, "Họ tên là bắt buộc"); }
    if(empty($ngaysinh)) { array_push($errors, "Ngày sinh là bắt buộc"); }
    if(empty($sdt)) { array_push($errors, "Số điện thoại là bắt buộc"); }
    if(empty($diachi)) { array_push($errors, "Địa chỉ là bắt buộc"); }
    if(empty($chucvu)) { array_push($errors, "Chức vụ là bắt buộc"); }
    if(empty($email)) { array_push($errors, "Email là bắt buộc"); }
    if(empty($gioitinh)) {$errors = "Chưa chọn giới tính";}
    if(empty($maphongban)) { array_push($errors, "Mã phòng ban là bắt buộc"); }
    if(empty($matkhau)) { array_push($errors, "Mật khẩu là bắt buộc"); }

    // Check if phone number or email already exist in database, add error if any
    $sql = "SELECT * FROM nhanvien WHERE id = ? OR manv = ? OR sdt = ? OR email = ?";
    $params = array($id, $manv, $sdt, $email);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if($stmt === false) { // Handle query error
        array_push($errors, "Database error: " . sqlsrv_errors()[0]['message']);
    } elseif(sqlsrv_has_rows($stmt)) { // Handle duplicate entry
        array_push($errors, "Mã số nhân viên, số điện thoại hoặc email đã tồn tại trong hệ thống.");
        sqlsrv_free_stmt($stmt);
    } else { // No error, continue
        sqlsrv_free_stmt($stmt);
        // Hash password using Argon2id algorithm
        $hashedPassword = password_hash($matkhau, PASSWORD_ARGON2ID);
        
        // Insert new employee record into database //(id, manv, hoten, ngaysinh, sdt, diachi, chucvu, email, gioitinh, maphongban, password)
        $sql = "INSERT INTO nhanvien(id, manv, hoten, ngaysinh, sdt, diachi, chucvu, email, gioitinh, maphongban, matkhau)
        VALUES (?, ?, ?, ? , ?, ?, ?, ?, ?, ?, ?)";
        $params = array($id, $manv, $hoten, $ngaysinh, $sdt, $diachi, $chucvu, $email, $gioitinh, $maphongban, $hashedPassword);
        $stmt = sqlsrv_query($conn, $sql, $params);
        if($stmt === false) { // Handle query error
            array_push($errors, "Database error: " . sqlsrv_errors()[0]['message']);
        } 
        else {
            ?>
            <script>
                alert('Thêm thành công!');
                window.location.href = 'DSNV.php';
            </script>
            <?php
            // header('Location: DSNV.php');
        }
        if( isset($stmt) && !empty($stmt) ) {
            sqlsrv_free_stmt($stmt);
        }
    }
    // If there is any error, display them
    if(!empty($errors)) {
        foreach($errors as $error) {
            ?>
            <script>
                alert('Có lỗi xảy ra trong quá trình đăng ký!');
                window.location.href = 'createNV.php';
            </script>
            <?php
            // echo "<div class='error'>$error</div>";
            // echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='createNV.php'>Thử lại</a>";
        }
    }
}
sqlsrv_close($conn);
?>
