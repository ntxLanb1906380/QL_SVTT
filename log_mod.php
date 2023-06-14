<?php
// Kết nối với csdl
include "connect.php"
    ?>
<?php
$password = $_POST["pw"];

// Hash password using Argon2id algorithm
// $options = [
//     'memory_cost' => 1024,
//     'time_cost' => 2,
//     'threads' => 2
// ];

// $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

// Kiểm tra xem form đã submit chưa

if (isset($_POST["mnv"]) && isset($_POST["pw"]) ) {
    // Kết nối đến CSDL
    // $conn = sqlsrv_connect($serverName, $connection);
    // if (!$conn) {
    //     die(print_r(sqlsrv_errors(), true));
    // } else {
    // Sử dụng Prepared Statement để bảo vệ khỏi SQL Injection
    $sql = "SELECT * FROM nhanvien WHERE manv = ?";
    $params = array($_POST["mnv"]);
    // var_dump($params);
    $stmt = sqlsrv_prepare($conn, $sql, $params);
    $mnv = $_POST["mnv"];
    if (!$stmt) {
        echo "Lỗi truy vấn: " . print_r(sqlsrv_errors(), true);
    } else {
        // Thực thi truy vấn
        $result = sqlsrv_execute($stmt);
        if ($result) {
            // $numRows = sqlsrv_num_rows($stmt);
            // $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            // var_dump($result);

            // Lấy số lượng bản ghi trả về
            if (sqlsrv_has_rows($stmt)) {
                // Lấy thông tin user
                $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                // Kiểm tra password
                if (password_verify($password, $row['matkhau'])) {
                    // Login success //Untitled_thtin
                    $cookie_name = "mnv";
                    $cookie_value = $row['manv'];
                    setcookie($cookie_name, $cookie_value, time() + (86400 / 24), "/");
                    setcookie("hoten", $row['hoten'], time() + (86400 / 24), "/");
                    setcookie("id", $row['id'], time() + (86400 / 24), "/");
                    header("Location: thtinNV.php?mnv=$mnv");
                } else {
                    // Wrong password
                    echo "Sai nhân viên hoặc mật khẩu";
                }
            } else {
                // User not found
                echo "Không tìm thấy tài khoản nhân viên";
            }
        } else {
            // Error executing query
            echo "Lỗi thực thi truy vấn: " . print_r(sqlsrv_errors(), true);
        }
        // Giải phóng resources
        sqlsrv_free_stmt($stmt);
    }
    sqlsrv_close($conn);
}
// }
?>
