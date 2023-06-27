<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>
        Cơ cấu tổ chức
    </title>
</head>
<body>
    <!-- Kết nối cơ sở dữ liệu -->
    <?php include "connect.php" ?>

    <!-- Bảng danh sách nhân viên  -->
    <h2 align="center"> CƠ CẤU TỔ CHỨC </h2>

    <?php
    // Kiểm tra kết nối
    if (!$conn) {
        die("Connection failed: " . sqlsrv_connect_error());
    }

    // Tạo câu lệnh truy vấn đệ quy để lấy thông tin cơ cấu tổ chức
    $sql = "WITH cte AS
        (
            SELECT maphongban, tenphongban, phongbancha
            FROM phongban
            WHERE phongbancha IS NULL
            UNION ALL
            SELECT p.maphongban, p.tenphongban, p.phongbancha
            FROM phongban AS p
            JOIN cte ON p.phongbancha = cte.maphongban
        )
        SELECT maphongban, tenphongban, phongbancha
        FROM cte
        ORDER BY tenphongban";

    $stmt = sqlsrv_query($conn, $sql);

    // Tạo câu lệnh truy vấn đệ quy để lấy tên nhân viên theo phòng ban/ tổ
    $sql_nv = "SELECT hoten, tenphongban
    FROM phongban pb JOIN nhanvien nv
    ON pb.maphongban = nv.maphongban
    ORDER BY tenphongban";

    $stmt_nv = sqlsrv_query($conn, $sql_nv);

    // Tạo danh sách cơ cấu tổ chức
    $org_structure = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        if ($row['phongbancha'] == null) {
            $org_structure[$row['maphongban']] = array(
                'tenphongban' => $row['tenphongban'],
                'subordinates' => array()
            );
        } else {
            $org_structure[$row['phongbancha']]['subordinates'][$row['maphongban']] = array(
                'tenphongban' => $row['tenphongban'],
                'subordinates' => array()
            );
        }
    }

    //Tạo một mảng kết hợp để lưu trữ thông tin nhân viên theo tên phòng ban hoặc tổ
    $employees_by_department = array();
    while ($row_nv = sqlsrv_fetch_array($stmt_nv, SQLSRV_FETCH_ASSOC)) {
        $department_name = $row_nv['tenphongban'];
        $employee_name = $row_nv['hoten'];
        if (!isset($employees_by_department[$department_name])) {
            $employees_by_department[$department_name] = array();
        }
        array_push($employees_by_department[$department_name], $employee_name);
    }

    // Đóng kết nối
    sqlsrv_close($conn);
    function display_org_structure($org_structure, $employees_by_department)
    {
        echo '<ul>';
        foreach ($org_structure as $department) {
            echo '<li>' . $department['tenphongban'];
            if (isset($employees_by_department[$department['tenphongban']])) {
                echo '<ul>';
                foreach ($employees_by_department[$department['tenphongban']] as $employee_name) {
                    echo '<li>' . $employee_name . '</li>';
                }
                echo '</ul>';
            }
            if (!empty($department['subordinates'])) {
                display_org_structure($department['subordinates'], $employees_by_department);
            }
            echo '</li>';
        }
        echo '</ul>';
    }
    // Gọi hàm để hiển thị thông tin cơ cấu tổ chức
    display_org_structure($org_structure, $employees_by_department);
    ?>
</body>
</html>