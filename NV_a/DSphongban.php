<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>
        Quản lý phòng ban, tổ
    </title>
</head>

<body>
    

    <?php include "connect.php" ?>
    
    <?php
    //get data
    $sql = "SELECT * FROM phongban";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "lỗi";
        die(print_r(sqlsrv_errors(), true));
    }

    ?>

    <!-- Bảng danh sách nhân viên  -->
    <h2 align="center">Danh sách phòng ban/ tổ </h2>
    <table border="2" align="center">
        <tr>
            <td>Mã phong ban</td>
            <td>Tên phòng ban</td>
            <td>Phòng ban cha</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>


        <?php
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            ?>
            <tr>
                <td>
                    <?php echo $row["maphongban"]; ?>
                </td>
                <td>
                    <?php echo $row["tenphongban"]; ?>
                </td>
                <td>
                    <?php echo $row["phongbancha"]; ?>
                </td>
                <td>
                    Edit
                </td>
                <td>
                    X
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="16" align="center">
                <button type="button" onclick="myFunction()">Thêm phòng ban/ tổ mới</button>
            </td>
        </tr>
    </table>
    
</body>

</html>
<script>
    function myFunction() {
        location.replace("createNV.php");
    }

</script>