<?php
header('Content-Type: text/html; charset=utf-8');
/* Database connection start */
include "connect.php";

// Check if form is submitted
if (isset($_POST['xulyFormGoiNho'])) {
    // Get input values
    $idnv = trim($_POST['id']);
    $thongtin = trim($_POST['info']);

    // Kiểm tra thông tin
    $sql = "SELECT id, email, sdt FROM nhanvien";
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        $errors = sqlsrv_errors();
        echo "<div class='alert alert-danger'>";
        echo "<h4>Error:</h4>";
        foreach ($errors as $error) {
            echo "- " . $error['message'] . "<br>";
        }
        echo "</div>";
    } else {
        $found = false;
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            if ($idnv == $row['id'] && in_array($thongtin, array($row['email'], $row['sdt']))) {
                $found = true;
                break;
            }
        }
        if ($found) {
            header('Location: datlaiMK.php?id='.$idnv);
        } else {
?>
            <script>
                alert('Không tìm thấy thông tin nhân viên!');
                window.location.href = 'quenMK.php';
            </script>
<?php
        }
    }
    sqlsrv_close($conn);
} else {
    echo "Không tìm thấy thông tin";
}
?>