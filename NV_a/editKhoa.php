<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>
    <meta charset="UTF-8">
    <title>
        Sửa thời gian khóa thực tập
    </title>
</head>

<body>
    <!-- connect database -->
    <?php include "connect.php" ?>

    <?php
    //
    session_start();
    include "connect.php";
    $mKh = $_GET['maK'];

    //lưu biến idnv vào session
    $_SESSION["maK"] = $mKh;

    $sql = "SELECT * FROM khoaTT where makhoa = ? ";
    $params = array($mKh);
    $result = sqlsrv_query($conn, $sql, $params);


    //in danh sách dữ liệu
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $ngBD = $row["ngayBD"];
        $ngBD_dmy = $ngBD->format('Y-m-d');
        $ngKT = $row["ngayKT"];
        $ngKT_dmy = $ngKT->format('Y-m-d');
    }
    ?>

    <form method="post" action="xulySuaKh.php" class="form">
        <h2>Sửa thời gian khóa thực tập</h2>
        Mã khóa thực tập: <?php echo $mKh; ?>
        <br />
        Thời gian bắt đầu: 
        <input type="date" name="ngBD" value="<?php echo $ngBD_dmy; ?>" required class="d"><br />
        Thời gian kết thúc: 
        <input type="date" name="ngKT" value="<?php echo $ngKT_dmy; ?>" required class="d">
        <br /><br />
        <input type="submit" name="saveKh" value="Lưu thông tin đã sửa" class="a" />
        <br />
        <input type="reset" name="reset" value="Reset" class="a" />
    </form>
</body>
</html>
