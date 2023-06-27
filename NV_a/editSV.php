<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>
    <meta charset="UTF-8">
    <title>
        Sửa thông tin sinh viên
    </title>
</head>

<body>
    <!-- connect database -->
    <?php include "connect.php" ?>

    <?php
    //get data
    $mssv = $_GET['mssv'];
    $sql = "SELECT * FROM sinhvien where mssv = ? ";
    $params = array($mssv);
    $result = sqlsrv_query($conn, $sql, $params);


    //in danh sách dữ liệu
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $mssv = $row["mssv"];
        $hten = $row["hoten"];
        $ngsinh = $row["ngaysinh"];
        $ngsinh_dmy = $ngsinh->format('Y-m-d');
        $dchi = $row["diachi"];
        $sdt = $row["sdt"];
        $email = $row["email"];
        $gtinh = $row["gioitinh"];
        $matruong = $row["matruong"];
        $makhoa = $row["makhoa"];
        $bangdiem = $row["bangdiem"];
        $dTB = $row["diemTB"];
        $idcb = $row["id"];
        $ndTT = $row["noidungTT"];
        $kqtt = $row["ketqua"];
        $currentMtruong = $row['matruong'];
        $currentMkhoa = $row['makhoa'];
        $currentID = $row['id'];
    }
    ?>

    <form method="post" action="xulySuaSV.php" class="form" enctype="multipart/form-data">
        <h2>Sửa thông tin sinh viên</h2>
        Mã số sinh viên:
        <input type="text" name="mssv" value="<?php echo $mssv; ?>" required class="d"><br />
        Họ tên:
        <input type="text" name="hoten" value="<?php echo $hten; ?>" required class="d"><br />
        Ngày sinh:
        <input type="date" name="ngsinh" value="<?php echo $ngsinh_dmy; ?>" required class="d"><br />
        Địa chỉ:
        <input type="text" name="dchi" value="<?php echo $dchi; ?>" required class="d"><br />
        Số điện thoại:
        <input type="tel" name="sdt" value="<?php echo $sdt; ?>" required class="d"><br />
        Email:
        <input type="email" name="email" value="<?php echo $email; ?>" required class="d"><br />
        Giới tính: <br />

        <input type="radio" id="gtinh1" name="gtinh" value="Nam" checked>
        <label for="html">Nam</label>
        <input type="radio" id="gtinh2" name="gtinh" value="Nữ">
        <label for="css">Nữ</label><br>

        Mã trường: <br />
        <select id="matruong" name="matruong">
            <?php
            //Tạo câu truy vấn để lấy mã trường
            $sql1 = "SELECT * FROM truong";
            $stmt1 = sqlsrv_query($conn, $sql1);
            if ($stmt1 === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            while ($row1 = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
                $selected1 = ($row1['matruong'] == $currentMtruong) ? 'selected="selected"' : '';
                echo "<option value='" . $row1['matruong'] . "' " . $selected1 . ">" . $row1['matruong'] . " - " . $row1['tentruong'] . "</option>";
            }
            sqlsrv_free_stmt($stmt1);
            ?>
        </select> <br /><br />



        Mã khóa TT:<br />
        <select id="makhoa" name="makhoa">
            <?php
            //Tạo câu truy vấn để lấy mã khóa thực tập
            $sql2 = "SELECT * FROM khoaTT";
            $stmt2 = sqlsrv_query($conn, $sql2);
            if ($stmt2 === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            while ($row2 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
                $selected2 = ($row2['makhoa'] == $currentMkhoa) ? 'selected="selected"' : '';
                echo "<option value='" . $row2['makhoa'] . "' " . $selected2 . ">" . $row2['makhoa'] . " ( " . $row2['ngayBD']->format('d-m-Y') . " - " . $row2['ngayKT']->format('d-m-Y') . " )</option>";
            }
            sqlsrv_free_stmt($stmt2);
            ?>
        </select> <br /><br />

        Bảng điểm:
        <input type="file" name="bangdiem" accept="application/pdf" class="d"><br />

        Điểm trung bình:
        <input type="text" name="diemTB" value="<?php echo $dTB; ?>" class="d"><br />

        Id cán bộ hướng dẫn:<br />
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

        Nội dung TT:
        <input type="text" name="ndtt" value="<?php echo $ndTT; ?>" class="d"><br />
        Kết quả TT:
        <input type="text" name="kqtt" value="<?php echo $kqtt; ?>" class="d"><br />

        <br /><br />
        <input type="submit" name="saveSV" value="Lưu thông tin đã sửa" class="a" />
        <br />
        <input type="reset" name="reset" value="Reset" class="a" />
        <?php require 'xulySuaSV.php'; ?>
    </form>
</body>
</html>
