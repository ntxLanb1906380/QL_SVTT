<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>
        Quản lý trường
    </title>
</head>

<body>
    

    <?php include "connect.php" ?>
    
    <?php
    //get data
    $sql = "SELECT * FROM truong";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "lỗi";
        die(print_r(sqlsrv_errors(), true));
    }

    ?>

    <!-- Bảng danh sách nhân viên  -->
    <h2 align="center">Danh sách trường </h2>
    <table border="2" align="center">
        <tr>
            <td>Mã trường</td>
            <td>Tên trường</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>


        <?php
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            ?>
            <tr>
                <td>
                    <?php echo $row["matruong"]; ?>
                </td>
                <td>
                    <?php echo $row["tentruong"]; ?>
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
                <button type="button" onclick="myFunction()">Thêm trường mới</button>
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