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
            <a href="cocautc.php?id=<?php echo $idnv; ?>">Xem cơ cấu tổ chức</a>
        </li>
        </br>

        <li>
            <a href="chonDSSVkhoa.php?id=<?php echo $idnv; ?>">Xem danh sách sinh viên hướng dẫn</a>
        </li>
        </br>

        <li>
            <a href="thtinNV.php?id=<?php echo $idnv; ?>">Xem thông tin cá nhân</a>
        </li>
        </br>

        <li>
            <a href="doiMK.php?id=<?php echo $idnv; ?>">Đổi mật khẩu</a>
        </li>
</body>

</html>