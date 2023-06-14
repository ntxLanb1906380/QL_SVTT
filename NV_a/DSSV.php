<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>
        Quản lý sinh viên
    </title>
</head>

<body>


    <?php include "connect.php" ?>

    <?php
    //get data
    $sql = "SELECT * FROM sinhvien";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "lỗi";
        die(print_r(sqlsrv_errors(), true));
    }

    ?>

    <!-- Bảng danh sách nhân viên  -->
    <h2 align="center">Danh sách sinh viên </h2>
    <table border="2" align="center">
        <tr>
            <td colspan="16" align="center">
                <button type="button" onclick="myFunction()">Thêm sinh viên mới</button>
            </td>
        </tr>
        <tr>
            <td>Mssv</td>
            <td>Họ tên</td>
            <td>Ngày sinh</td>
            <td>Địa chỉ</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td>Giới tính</td>
            <td>Mã trường</td>
            <td>Mã khóa</td>
            <td>Bảng điểm</td>
            <td>Điểm trung bình</td>
            <td>Nội dung thực tập</td>
            <td>Kết quả thực tập</td>
            <td>Id cán bộ hướng dẫn</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>


        <?php
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            ?>
            <tr>
                <td>
                    <?php echo $row["mssv"]; ?>
                </td>
                <td>
                    <?php echo $row["hoten"]; ?>
                </td>
                <td>
                    <?php echo $row["ngaysinh"]->format('d-m-Y'); ?>
                </td>
                <td>
                    <?php echo $row["diachi"]; ?>
                </td>
                <td>
                    <?php echo $row["sdt"]; ?>
                </td>
                <td>
                    <?php echo $row["email"]; ?>
                </td>
                <td>
                    <?php echo $row["gioitinh"]; ?>
                </td>
                <td>
                    <?php echo $row["matruong"]; ?>
                </td>
                <td>
                    <?php echo $row["makhoa"]; ?>
                </td>
                <td>
                    <a href='<?php echo $row["bangdiem"]; ?>' target="_blank">Xem bảng điểm</a>
                </td>
                <td>
                    <?php echo $row["diemTB"]; ?>
                </td>
                <td>
                    <?php echo $row["noidungTT"]; ?>
                </td>
                <td>
                    <?php echo $row["ketqua"]; ?>
                </td>
                <td>
                    <?php echo $row["id"]; ?>
                </td>
                <td>
                    <a href="editSV.php?mssv=<?php echo $row['mssv']; ?> ">Edit</a>
                </td>
                <td>
                    <a href="deleteSV.php?mssv=<?php echo $row['mssv']; ?> ">X</a>
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
        location.replace("createSV.php");
    }

</script>