<!DOCTYPE html>
<html>

<body>

    <head>
        <title>Trang chủ</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <h2>Trang chủ </h2>
    <?php
    session_start();
    include "connect.php";
    $idnv = $_GET["id"];

    //lưu biến idnv vào session
    $_SESSION["idnv"] = $idnv;
    ?>
    <ul>
        <li>
            <a href="../NV_h/cocautc.php">Xem cơ cấu tổ chức</a>
        </li>
        </br>

        <li>
            <a href="DSSV.php">Quản lý danh sách sinh viên</a>
        </li>
        </br>

        <li>
            <a href="DSNV.php">Quản lý danh sách nhân viên</a>
        </li>
        </br>

        <li>
            <a href="DStruong.php">Danh sách trường có sinh viên thực tập tại đây</a>
        </li>
        </br>

        <li>
            <a href="DSkhoaTT.php">Danh sách khóa thực tập</a>
        </li>
        </br>

        <li>
            <a href="chonkhoa.php">Danh sách phân công hướng dẫn sinh viên thực tập</a>
        </li>
        </br>

        <li>
            <a href="../NV_h/chonDSSVkhoa.php?id=<?php echo $idnv; ?>">Xem danh sách sinh viên hướng dẫn</a>
        </li>
        </br>

        <li>
            <a href="hoatdong.php">Các hoạt động gần đây</a>
        </li>
        </br>

        <li>
            <a href="../NV_h/thtinNV.php?id=<?php echo $idnv; ?>">Xem thông tin cá nhân</a>
        </li>
        </br>

        <li>
            <a href="../NV_h/doiMK.php?id=<?php echo $idnv; ?>">Đổi mật khẩu</a>
        </li>
</body>

</html>
