<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
    <title>Hồ sơ cá nhân</title>
</head>

<body>
    <h2> Hồ sơ cá nhân </h2>
    <?php
    include "connect.php";
    session_start();
    $idnv = $_SESSION["idnv"];
    $sql = "SELECT * FROM nhanvien WHERE id = ?";
    $params = array($idnv);
    $stmt = sqlsrv_query($conn, $sql, $params);
    // if(!isset($_COOKIE["mnv"])){
    if (!$stmt) {
        echo "Lỗi truy vấn: " . print_r(sqlsrv_errors(), true);
    } else {
        if (!sqlsrv_has_rows($stmt)) {
            echo "Không tìm thấy thông tin cá nhân.";
        } else {
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            // Format the date of birth
            $ngaysinh = $row['ngaysinh']->format('d/m/Y');
            ?>
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <?php echo $row['id'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Mã nhân viên:</td>
                    <td>
                        <?php echo $row['manv'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Họ và tên:</td>
                    <td>
                        <?php echo $row['hoten'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh:</td>
                    <td>
                        <?php echo $ngaysinh ?>
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td>
                        <?php echo $row['sdt'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <?php echo $row['email'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td>
                        <?php echo $row['diachi'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td>
                        <?php echo $row['gioitinh'] === '1' ? 'Nam' : 'Nữ' ?>
                    </td>
                </tr>
                <tr>
                    <td>Mã phòng ban:</td>
                    <td>
                        <?php echo $row['maphongban'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Chức vụ:</td>
                    <td>
                        <?php echo $row['chucvu'] ?>
                    </td>
                </tr>
            </table>

            <button type="button" onclick="myFunction()"> Cập nhật thông tin </button>
            <button type="button" onclick="print()"> In ra</button>
            <?php
        }
        sqlsrv_free_stmt($stmt);
    }
    ?>
</body>

</html>
<script>
    function myFunction() {
        location.replace("UpdateNV.php");
    }
    function print() {
        location.replace("printInfo.php");
    }

</script>
