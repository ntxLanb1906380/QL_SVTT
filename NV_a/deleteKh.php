<?php
/* Database connection start */
include "connect.php" ?>

<?php
if (isset($_GET['maK'])) {
	$mKh = $_GET["maK"];
	// Xóa sinh viên
	$sql = "DELETE FROM khoaTT WHERE makhoa = ?";
	$params = array($mKh);
	$stmt = sqlsrv_prepare($conn, $sql, $params);

	if (sqlsrv_execute($stmt)) {
        ?>
        <script>
            alert('Xóa thành công!');
            window.location.href = 'DSKhoaTT.php';
        </script>
        <?php
	} else {
		$loi = sqlsrv_errors();
		foreach ($errors as $error) {
			echo "Error: " . $error['message'];
		}
	}

	sqlsrv_free_stmt($stmt);
	sqlsrv_close($conn);
} else {
	echo "Lỗi: makhoa parameter is not set";
}
?>