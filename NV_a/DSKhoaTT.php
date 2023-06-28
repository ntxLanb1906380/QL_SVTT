<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>
        Quản lý khóa thực tập
    </title>
</head>

<body>
    

    <?php include "connect.php" ?>
    
    <?php
    //get data
    $sql = "SELECT * FROM khoaTT";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "lỗi";
        die(print_r(sqlsrv_errors(), true));
    }

    ?>

    <!-- Bảng danh sách nhân viên  -->
    <h2 align="center">Danh sách khóa thực tập </h2>
    <table border="2" align="center">
        <tr>
            <td>Mã khóa</td>
            <td>Ngày bắt đầu</td>
            <td>Ngày kết thúc</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>


        <?php
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            ?>
            <tr>
                <td>
                    <?php echo $row["makhoa"]; ?>
                </td>
                <td>
                    <?php echo $row["ngayBD"]->format('d-m-Y'); ?>
                </td>
                <td>
                    <?php echo $row["ngayKT"]->format('d-m-Y'); ?>
                </td>
                <td>
                <a href="editKhoa.php?maK=<?php echo $row['makhoa']; ?> ">Sửa</a>
                </td>
                <td>
                <a href="deleteKh.php?maK=<?php echo $row['makhoa']; ?> ">X</a>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="5" align="center">
                <button type="button" onclick="myFunction()">Thêm khóa mới</button>
            </td>
        </tr>
    </table>
    
</body>

</html>
<script>
    function myFunction() {
        location.replace("themkhoa.php");
    }

</script>