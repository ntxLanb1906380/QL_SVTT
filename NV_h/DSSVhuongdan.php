<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>Danh sách sinh viên hướng dẫn</title>
</head>

<body>
    <h2> Danh sách sinh viên hướng dẫn </h2>
    <?php
    include "connect.php";
    session_start();
    $idnv = $_SESSION["idnv"];
    $mkhoa = $_GET["makhoa"];
    $sql = "SELECT * FROM sinhvien WHERE makhoa = ? AND id = ?";
    $params = array($mkhoa, $idnv);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if (!$stmt) {
        echo "Lỗi truy vấn: " . print_r(sqlsrv_errors(), true);
    } else {
        if (!sqlsrv_has_rows($stmt)) {
            echo "Không có hướng dẫn sinh viên nào.";
        } else {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo $row["mssv"] . " " . $row["hoten"] ;
                ?>
                <a href="thtinSVthtap.php?mssv=<?php echo $row['mssv']; ?> ">Xem</a><br>
                <?php
            }
        }
        sqlsrv_free_stmt($stmt);
    }
    ?>
</body>

</html>