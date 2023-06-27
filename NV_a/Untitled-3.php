<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>
        Danh sách sinh viên một khóa
    </title>
</head>

<body>
    <?php
    include "connect.php";
    $mkhoa = $_GET["makhoa"];
    $sql = "SELECT * FROM sinhvien WHERE makhoa = ?";
    $param = array($mkhoa);
    $stmt = sqlsrv_query($conn, $sql, $param);

    if ($stmt === false) {
        echo "lỗi";
        die(print_r(sqlsrv_errors(), true));
    } else {
        ?>
        <h2 align="center">Danh sách sinh viên khóa
            <?php echo $mkhoa ?>
        </h2>
        <table border="2" align="center">
            <tr>
                <td>Mssv</td>
                <td>Họ tên</td>
                <td>Mã trường</td>
                <td>Mã khóa</td>
                <td>Nội dung thực tập</td>
                <td>Kết quả thực tập</td>
                <td>Id cán bộ hướng dẫn</td>
                <td>Sửa</td>
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
                        <?php echo $row["matruong"]; ?>
                    </td>
                    <td>
                        <?php echo $row["makhoa"]; ?>
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
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    ?>
</body>

</html>