<?php
// Kiểm tra nếu nhân viên đã đăng nhập
session_start();
if (isset($_SESSION['mnv'])) {
    $mnv = $_SESSION['mnv'];

    // Tìm kiếm thông tin của nhân viên trong CSDL
    // Kết nối đến CSDL ở đây

    $serverName = "LLANN";
    $database = "QL_SVTT";
    $uid = "";
    $pass = "";

    $conn = sqlsrv_connect($serverName, array(
        "Database" => $database,
        "Uid" => $uid,
        "PWD" => $pass
    )
    );

    $query = "SELECT * FROM nhanvien WHERE manv = $mnv;";
    $result = sqlsrv_query($conn, $query);

    if ($result) {
        $numRows = sqlsrv_num_rows($result);
        if ($numRows == 1) {
            // Tìm thấy nhân viên trong CSDL
            $employee = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
            echo "Thông tin của nhân viên " . $employee['hoten'] . ":";
            echo "<br>";
            echo "ID: " . $employee['id'];
            echo "<br>";
            echo "Email: " . $employee['email'];
            echo "<br>";
            echo "Số điện thoại: " . $employee['sdt'];
            // Nếu cần in ra thêm thông tin khác của nhân viên, bạn có thể thêm vào đây
        } else {
            // Không tìm thấy nhân viên trong CSDL
            echo "Không tìm thấy thông tin của nhân viên!";
        }

        // Đóng kết nối đến CSDL
        sqlsrv_close($conn);
    }
} else {
    // Nếu nhân viên chưa đăng nhập, chuyển hướng về trang đăng nhập
    header('Location: login.php');
}
?>
