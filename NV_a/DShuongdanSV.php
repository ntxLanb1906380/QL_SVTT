<!DOCTYPE html>
<html>
<style>
    .e {
        text-align: center;
    }
</style>

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
                $currentID = $row['id'];
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
                        <?php echo $row["noidungTT"]; ?><br />
                        <input type="text" id="input-noidungTT-<?php echo $row["noidungTT"]; ?>"
                            placeholder="Nhập nội dung thực tập mới">

                    </td>
                    <td>
                        <?php echo $row["ketqua"]; ?><br />
                        <input type="text" id="input-ketqua-<?php echo $row["ketqua"]; ?>"
                            placeholder="Nhập kết quả thực tập mới">

                    </td>
                    <!-- lưu trực tiếp $ndtt và $kqtt tại trang này -->
                    <td>
                        <select id="idcb" name="idcb" class="e">
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
                    </td>
                    <td>
                        <button type="button" onclick="luuThayDoi('<?php echo $row['mssv']; ?>')">Lưu thay đổi</button>
                        <!-- <a href="editSV.php?mssv=<?php echo $row['mssv']; ?> ">Lưu thay đổi</a> -->
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
<script>
    function luuThayDoi(mssv) {
  // Lấy giá trị mới của noidungTT và ketqua từ các input, ở đây ta giả sử các input có id lần lượt là input-noidungTT và input-ketqua
        var inputNoidungTT = document.getElementById("input-noidungTT-" + mssv).value;
        var inputKetqua = document.getElementById("input-ketqua-" + mssv).value;

        // Tạo mới đối tượng XMLHttpRequest
        var xhttp = new XMLHttpRequest();

        // Gửi yêu cầu đến server thông qua phương thức POST và gửi dữ liệu lên server dưới dạng form data
        xhttp.open("POST", "luuThayDoi.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("mssv=" + mssv + "&noidungTT=" + inputNoidungTT + "&ketqua=" + inputKetqua);

        // Xử lý phản hồi từ server, thông báo lưu thành công hoặc hiển thị thông báo lỗi
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "success") {
                    alert("Lưu thành công!");
                } else {
            alert("Lưu thất bại!");
      }
    }
  };
}

</script>