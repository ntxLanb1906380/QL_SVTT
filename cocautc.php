
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

    // Đóng kết nối
    sqlsrv_close($conn);

    function display_org_structure($org_structure)
    {
        echo '<ul>';
        foreach ($org_structure as $department) {
            echo '<li>' . $department['tenphongban'];
            if (!empty($department['subordinates'])) {
                display_org_structure($department['subordinates']);
            }
            echo '</li>';
        }
        echo '</ul>';
    }

    // Gọi hàm để hiển thị thông tin cơ cấu tổ chức
    display_org_structure($org_structure);


    ?>

</body>

</html>