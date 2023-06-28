<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>
    <meta charset="UTF-8">
    <title>
        Sửa tên trường
    </title>
</head>

<body>
    <!-- connect database -->
    <?php include "connect.php" ?>

    <?php
    //
    session_start();
    include "connect.php";
    $mtr = $_GET['matr'];

    //lưu biến idnv vào session
    $_SESSION["matr"] = $mtr;

    $sql = "SELECT * FROM truong where matruong = ? ";
    $params = array($mtr);
    $result = sqlsrv_query($conn, $sql, $params);


    //in danh sách dữ liệu
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $tentr = $row["tentruong"];
    }
    ?>

    <form method="post" action="xulySuaTr.php" class="form">
        <h2>Sửa tên trường</h2>
        Mã trường: <?php echo $mtr; ?>
        <br />
        Tên trường: 
        <input type="text" name="tentruong" value="<?php echo $tentr; ?>" required class="d"><br />
        <br /><br />
        <input type="submit" name="saveTr" value="Lưu thông tin đã sửa" class="a" />
        <br />
        <input type="reset" name="reset" value="Reset" class="a" />
    </form>
</body>
</html>
