<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>Cơ cấu tổ chức</title>

    <!-- Thêm CSS để thiết kế dropdown menu -->
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>

    <!-- Thêm JavaScript để hiển thị phòng ban và nhân viên khi nhấp vào dropdown -->
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var departments = document.getElementsByClassName("department");
            for (var i = 0; i < departments.length; i++) {
                departments[i].addEventListener("click", function() {
                    this.nextElementSibling.classList.toggle("show");
                });
            }

            var teams = document.getElementsByClassName("team");
            for (var i = 0; i < teams.length; i++) {
                teams[i].addEventListener("click", function() {
                    this.nextElementSibling.classList.toggle("show");
                });
            }
        });
    </script>
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
    // Tạo câu lệnh truy vấn để lấy thông tin nhân viên theo phòng/tổ
    // $sql = "WITH cte AS
    // (
    //     SELECT maphongban, hoten, null as phongbantochuc
    //     FROM nhanvien
    //     WHERE maphongban = @maphongban
    //     UNION ALL
    //     SELECT nv.maphongban, nv.hoten, pbt.phongbanmacha
    //     FROM nhanvien AS nv 
    //     JOIN phongban_tochuc AS pbt ON nv.maphongban = pbt.maphongban
    //     JOIN cte ON pbt.phongbanmacha = cte.maphongban
    // )
    // SELECT maphongban, hoten, phongbantochuc
    // FROM cte
    // ORDER BY hoten";

    // $stmt_nv = sqlsrv_query($conn, $sql, array($department_id));

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
        foreach ($org_structure as $key => $department) {
            echo '<li class="department">' . $department['tenphongban'];

            // Nếu phòng ban có thành viên, hiển thị dropdown menu
            if (isset($employees_by_department[$department['tenphongban']])) {
                echo '<ul class="dropdown-content">';
                foreach ($employees_by_department[$department['tenphongban']] as $employee_name) {
                    echo '<li>' . $employee_name . '</li>';
                }
                echo '</ul>';
            }

            // Nếu phòng ban có tổ, hiển thị dropdown menu để chọn tổ
            if (!empty($department['subordinates'])) {
                echo '<ul>';
                foreach ($department['subordinates'] as $key => $team) {
                    echo '<li class="team">' . $team['tenphongban'];

                    // Nếu tổ có thành viên, hiển thị dropdown menu
                    if (isset($employees_by_department[$team['tenphongban']])) {
                        echo '<ul class="dropdown-content">';
                        foreach ($employees_by_department[$team['tenphongban']] as $employee_name) {
                            echo '<li>' . $employee_name . '</li>';
                        }
                        echo '</ul>';
                    }

                    echo '</li>';
                }
                echo '</ul>';
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
