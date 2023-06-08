<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
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
    }
    ?>

    <form method="post" action="xulySuaSV.php" class="form">
        <h2>Sửa thông tin sinh viên</h2>
        Mã số sinh viên:
        <input type="text" name="mssv" value="<?php echo $mssv; ?>" required class="d"><br />
        Họ tên:
        <input type="text" name="hoten" value="<?php echo $hten; ?>" required class="d"><br />
        Ngày sinh:
        <input type="date" name="ngsinh" value="<?php echo $ngsinh->format('d-m-Y'); ?>" required class="d"><br />
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
            <option value="<?php echo $matruong; ?>"><?php echo $matruong; ?></option>
            <option value="CTU"> CTU - Trường Đại học Cần Thơ</option>
            <option value="DVL"> DVL - Trường Đại học Văn Lang</option>
            <option value="DVT"> DVT - Trường Đại học Trà Vinh</option>
            <option value="TTG"> TTG - Trường Đại học Tiền Giang</option>
        </select> <br /><br />



        Mã khóa TT:
        <select id="makhoa" name="makhoa">
            <option value="<?php echo $makhoa; ?>"><?php echo $makhoa; ?></option>
            <option value="K1"> K1</option>
            <option value="K2"> K2</option>
            <option value="K3"> K3</option>
            <option value="K4"> K4</option>
        </select> <br /><br />

        Bảng điểm:
        <input type="text" name="bangdiem" value="<?php echo $bangdiem; ?>" class="d"><br />
        Điểm trung bình:
        <input type="text" name="diemTB" value="<?php echo $dTB; ?>" class="d"><br />
        Id cán bộ hướng dẫn:
        <input type="text" name="idcb" value="<?php echo $idcb; ?>" required class="d"><br />
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