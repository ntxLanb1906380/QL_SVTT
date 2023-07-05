<!DOCTYPE html>
<html>
<style>
    table {
        text-align: center;
    }
</style>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>
        Cập nhật ID hướng dẫn
    </title>
</head>

<body>
    <?php
    include "connect.php";
    session_start();

    if (isset($_SESSION['makhoa'])) {
        $mkhoa = $_SESSION['makhoa'];
    } else {
        $mkhoa = $_GET["makhoa"];

        //lưu biến $mkhoa vào session
        $_SESSION["makhoa"] = $mkhoa;
    }
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
        <!-- <form action="luuThayDoiSV.php" method="POST" onsubmit="return luuThayDoi()"> -->
        <form action="luuThayDoiSV.php" method="POST">
            <table border="2">
                <tr>
                    <td>Mssv</td>
                    <td>Họ tên</td>
                    <td>Mã trường</td>
                    <td>Mã khóa</td>
                    <td>Id nhân viên</td>
                    <td>Lưu thay đổi</td>
                </tr>

                <?php
                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                    $currentID = $row['id'];
                    ?>
                    <tr id="row-<?php echo $row['mssv']; ?>">
                        <td>

                            <input type="hidden" name="mssv" value="<?php echo $row["mssv"]; ?>">
                            <?php
                            echo $row["mssv"];
                            ?>
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
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                            <input class="limit-width" type="text" name="idnv" value="<?php echo $row["id"]; ?>" oninput="luuThayDoi('<?php echo $row['mssv']; ?>', this.value)">
                        </td>
                        <td>
                            <button type="submit">Lưu</button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </form>

        <h3>Danh sách nhân viên</h3>
        <select id="idcb" name="idcb">
            <?php
            //Tạo câu truy vấn để lấy id cán bộ hướng dẫn
            $sql3 = "SELECT * FROM nhanvien";
            $stmt3 = sqlsrv_query($conn, $sql3);
            if ($stmt3 === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            while ($row3 = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
                $selected3 = ($row3['id'] == $currentID) ? 'selected="selected"' : '';
                echo "<option value='" . $row3['id'] . "' " . $selected3 . ">" . $row3['id'] . " - " . $row3['manv'] . " - " . $row3['hoten'] . "</option>";
            }
            sqlsrv_free_stmt($stmt3);
            ?>
        </select> <br /><br />
        <?php
    }
    ?>

</body>

</html>
<script>
    function luuThayDoi(mssv, idnv) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
            }
        };

        var url = "luuThayDoiSV.php?mssv=" + mssv + "&id=" + idnv;
        xhr.open("GET", url, true);
        xhr.send();

        return false; // Ngăn chặn mặc định của sự kiện
    }
</script>
