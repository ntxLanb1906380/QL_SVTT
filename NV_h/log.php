<?php
/* Database connection start */
$serverName = "LLANN";
$database = "QL_SVTT";
$uid = "";
$pass = "";
$connection = [
    "Database" => $database,
    "Uid" => $uid,
    "PWD" => $pass
];
$conn = sqlsrv_connect($serverName, $connection);
if(!$conn){
    die (print_r(sqlsrv_errors(),true));
} 
else {  
    // Sử dụng Prepared Statement để bảo vệ khỏi SQL Injection
    $sql = "SELECT * FROM nhanvien WHERE manv = ? AND matkhau = ?;";
    $params = array($_POST["mnv"], $_POST["pw"]);
    $stmt = sqlsrv_prepare($conn, $sql, $params);
    $result = sqlsrv_execute($stmt);
    if(!$stmt) {
        echo "Lỗi truy vấn: " . print_r(sqlsrv_errors(), true);
    } else {
        // Thực thi truy vấn
        if($result) {
            if(sqlsrv_has_rows($stmt)) {
                $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                echo "Đăng nhập thành công <br>";
                   } if (sqlsrv_has_rows($stmt) > 0) {
                   $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                   $cookie_name = "user";
                   $cookie_value = $row['manv'] ;
                   setcookie($cookie_name, $cookie_value, time() + (86400 / 24), "/");
                   setcookie("hoten", $row['hoten'], time() + (86400 / 24), "/");
                   setcookie("id", $row['id'], time() + (86400 / 24), "/");
                   header('Location: trangchu.php');
            } else {
                echo "Sai tên đăng nhập hoặc mật khẩu";
            }
        } else {
            echo "Lỗi thực thi truy vấn: " . print_r(sqlsrv_errors(), true);
       }
    }}

    // Giải phóng resources
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
?>