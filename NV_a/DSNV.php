<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>
        Quản lý nhân viên
    </title>
</head>

<body>

    <?php include "connect.php" ?>
    <?php
    //get data
    $sql = "SELECT * FROM nhanvien";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "lỗi";
        die(print_r(sqlsrv_errors(), true));
    }

    ?>

    <!-- Bảng danh sách nhân viên  -->
    <h2 align="center">Danh sách nhân viên </h2>
    <table border="2" align="center">
        <tr>
            <td colspan="12" align="center">
                <button type="button" onclick="myFunction()">Thêm nhân viên mới</button>
            </td>
        </tr>
        <tr>
            <td>Id</td>
            <td>Mã số nhân viên</td>
            <td>Họ tên</td>
            <td>Ngày sinh</td>
            <td>Số điện thoại</td>
            <td>Địa chỉ</td>
            <td>Chức vụ</td>
            <td>Email</td>
            <td>Giới tính</td>
            <td>Mã phòng ban</td>
            <td>Cập nhật</td>
            <td>Xóa</td>
        </tr>

        <?php
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            ?>
            <tr>
                <td>
                    <?php echo $row["id"]; ?>
                </td>
                <td>
                    <?php echo $row["manv"]; ?>
                </td>
                <td>
                    <?php echo $row["hoten"]; ?>
                </td>
                <td>
                    <?php echo $row["ngaysinh"]->format('d-m-Y'); ?>
                </td>
                <td>
                    <?php echo $row["sdt"]; ?>
                </td>
                <td>
                    <?php echo $row["diachi"]; ?>
                </td>
                <td>
                    <?php echo $row["chucvu"]; ?>
                </td>
                <td>
                    <?php echo $row["email"]; ?>
                </td>
                <td>
                    <?php echo $row["gioitinh"]; ?>
                </td>
                <td>
                    <?php echo $row["maphongban"]; ?>
                </td>
                <td>
                    <a href="editNV.php?idnvhd=<?php echo $row['id']; ?> ">Edit</a>
                </td>
                <td>
                    <a href="deleteNV.php?idnvhd=<?php echo $row['id']; ?> ">X</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>
<script>
    function myFunction() {
        location.replace("createNV.php");
    }

</script>
