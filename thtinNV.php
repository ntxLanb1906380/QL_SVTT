<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style2.css">
    <title>Thông tin nhân viên</title>

</head>
<body>
<!-- Kết nối với csdl để lấy tt nhanvien -->
        <?php
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
        
        session_start();
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];

        $query = "SELECT * FROM nhanvien WHERE id = $id;";
        $result = sqlsrv_query($conn, $query);

        if ($result) {
            //$numRows = sqlsrv_num_rows($result);
            $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
            var_dump($row);

            //Lấy số lượng bản ghi trả về
            if (sqlsrv_has_rows($result) == 1) {
                //Lấy thông tin user
                $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
            //if (mysqli_num_rows($result) == 1) {
            // Tìm thấy nhân viên trong CSDL
            //$employee = mysqli_fetch_assoc($result);
            echo "Thông tin của nhân viên " . $employee['name'] . ":";
            echo "<br>";
            echo "ID: " . $employee['id'];
            echo "<br>";
            echo "Email: " . $employee['email'];
            echo "<br>";
            echo "Số điện thoại: " . $employee['phone'];
            // Nếu cần in ra thêm thông tin khác của nhân viên, bạn có thể thêm vào đây
        } else {
            // Không tìm thấy nhân viên trong CSDL
            echo "Không tìm thấy thông tin của nhân viên!";
        }}}
        ?>

    
</body>

</html>