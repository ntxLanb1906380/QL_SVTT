<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>
        Sửa thông tin phòng ban/ tổ
    </title>
</head>

<body>
    <?php
    session_start();
    include "connect.php";
    $mPB = $_GET['maPB'];

    //lưu biến mPB vào session
    $_SESSION["maPB"] = $mPB;

    $sql = "SELECT * FROM phongban where maphongban = ? ";
    $params = array($mPB);
    $result = sqlsrv_query($conn, $sql, $params);


    //in danh sách dữ liệu
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $tenpb = $row["tenphongban"];
        $pbcha = $row["phongbancha"];
        $currentpbcha = $row['phongbancha'];
    }
    ?>

    <form method="post" action="xulySuaPBan.php" class="form">
        <h2>Sửa thông tin</h2>
        Mã phòng ban:
        <?php echo $mPB; ?>
        <br />
        Tên phòng ban:
        <input type="text" name="tenpb" value="<?php echo $tenpb; ?>" required class="d"><br /><br />
        Phòng ban cha:
        <select id="pbcha" name="pbcha">
            <option value=null>Không có</option>
            <?php
            // Tạo câu truy vấn để lấy dữ liệu phòng ban
            $sql = "SELECT * FROM phongban";
            $stmt = sqlsrv_query($conn, $sql);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $selected = '';

                // Kiểm tra nếu phòng ban cha hiện tại trong vòng lặp trùng với phòng ban cha đã lưu
                if ($row['maphongban'] == $pbcha) {
                    $selected = 'selected="selected"';
                }
                if ($row['phongbancha'] === null) {
                    echo "<option value='" . $row['maphongban'] . "' " . $selected . ">" . $row['maphongban'] . " - " . $row['tenphongban'] . "</option>";
                }
            }
            sqlsrv_free_stmt($stmt);
            ?>
        </select> <br /><br />
        <input type="submit" name="savePB" value="Lưu thông tin đã sửa" class="a" />
        <br />
        <input type="reset" name="reset" value="Reset" class="a" />
    </form>
</body>

</html>