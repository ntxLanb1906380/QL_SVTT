<?php
// connect database
include "connect.php";

// get data from form
session_start();
$mssv = $_SESSION["mssv"];

if (isset($_POST['saveSV'])) {
    // get input values
    $ndtt = trim($_POST['ndtt']);
    $kqtt = trim($_POST['kqtt']);

    //cập nhật thông tin thực tập sinh viên
    if (($ndtt == "") && ($kqtt == "")) {
        // Hiện thông báo lỗi và không lưu
        echo "Vui lòng nhập thông tin muốn thay đổi!";
    }

    // Tiến hành lưu thông tin vào cơ sở dữ liệu

    $sql = "UPDATE sinhvien SET ketqua=?, noidungTT=? WHERE mssv=?";
    $params = array($kqtt, $ndtt, $mssv);
    $result = sqlsrv_query($conn, $sql, $params);
    if ($result === false) {
        $errors = sqlsrv_errors();
        echo "<div class='alert alert-danger'>";
        echo "<h4>Error:</h4>";
        foreach ($errors as $error) {
            echo "- " . $error['message'] . "<br>";
        }
        echo "</div>";
    } else {
        // header('Location: thtinSVthtap.php?mssv='.$mssv);

        ?>
        <script>
            alert('Cập nhật thành công!');
            window.location.href = 'thtinSVthtap.php?mssv=<?php echo $mssv ?>';
        </script>
        <?php
    }

}

sqlsrv_close($conn);
?>