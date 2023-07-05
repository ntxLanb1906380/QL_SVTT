<?php
// Kết nối với csdl
include "connect.php"
    ?>
<?php
$password = $_POST["pw"];

// Kiểm tra xem form đã submit chưa

if (isset($_POST["mnv"]) && isset($_POST["pw"])) {
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
            // Lấy số lượng bản ghi trả về
            if (sqlsrv_has_rows($stmt)) {
                // Lấy thông tin user
                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                    $id = $row["id"];
                    // Kiểm tra password
                    if (password_verify($password, $row['matkhau'])) {
                        // $cookie_name = "mnv";
                        // $cookie_value = $row['manv'];
                        // setcookie($cookie_name, $cookie_value, time() + (86400 / 24), "/");
                        // setcookie("hoten", $row['hoten'], time() + (86400 / 24), "/");
                        // setcookie("id", $row['id'], time() + (86400 / 24), "/");

                        // Khi người dùng đăng nhập thành công
                        session_start();
                        $_SESSION['idnv'] = $id;

                        if ($row["chucvu"] !== "Nhân viên admin") {
                            header("Location: trangchu.php");
                        } else {

                            header("Location: ../NV_a/trangchuAD.php");
                        }
                    } else {
                        // Wrong password
                        echo "Sai nhân viên hoặc mật khẩu";
                    }
                }
            } else {
                // User not found
                echo "Không tìm thấy tài khoản nhân viên";
            }
        } else {
            echo "Lỗi thực thi truy vấn: " . print_r(sqlsrv_errors(), true);
        }
        // Giải phóng resources
        sqlsrv_free_stmt($stmt);
    }
    sqlsrv_close($conn);
}
// }
?>
