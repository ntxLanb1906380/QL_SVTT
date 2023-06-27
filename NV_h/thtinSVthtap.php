<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>
        Thông tin sinh viên
    </title>
</head>

<body>
    <!-- connect database -->
    <?php include "connect.php" ?>



    <?php
    //get data
    session_start();
    include "connect.php";
    $mssv = $_GET['mssv'];

    //lưu biến mssv vào session
    $_SESSION["mssv"] = $mssv;

    //lấy biến idnv từ session
    // $idnv = $_SESSION["idnv"];

    $sql = "SELECT * FROM sinhvien where mssv = ? ";
    $params = array($mssv);
    $result = sqlsrv_query($conn, $sql, $params);
    ?>
    <!-- <div>
        <a href="trangchu.php?id=".$idnv>Về trang chủ</a>
    </div> -->
    <?php
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
        $ndTT = $row["noidungTT"];
        $kqtt = $row["ketqua"];
    }
    ?>

    <form method="post" action="Update-thtinSVthtap.php" class="form">
        <h2>Thông tin sinh viên</h2>
        Mã số sinh viên:
        <?php echo $mssv; ?><br />

        Họ tên:
        <?php echo $hten; ?><br />

        Ngày sinh:
        <?php echo $ngsinh_dmy; ?><br />

        Địa chỉ:
        <?php echo $dchi; ?><br />

        Số điện thoại:
        <?php echo $sdt; ?><br />

        Email:
        <?php echo $email; ?><br />

        Giới tính:
        <?php echo $gtinh; ?><br />

        Mã trường:
        <?php echo $matruong; ?><br />

        Mã khóa TT:
        <?php echo $makhoa; ?><br />

        Bảng điểm:
        <a href='<?php echo $bangdiem ?>' target="_blank">Xem bảng điểm</a></br>


        Điểm trung bình:
        <?php echo $dTB; ?><br />

        Nội dung TT:
        <input type="text" name="ndtt" class="d" value="<?php echo $ndTT; ?>"><br />
        Kết quả TT:
        <input type="text" name="kqtt" class="d" value="<?php echo $kqtt; ?>" class="d"><br />

        <br /><br />
        <input type="submit" name="saveSV" value="LuuThayDoi" class="a" />
        <br />
        <input type="reset" name="reset" value="Reset" class="a" />
    </form>
</body>

</html>