<?php
/* Database connection start */
include "connect.php" ?>

<?php
if (isset($_GET['maPB'])) {
	$mPB = $_GET["maPB"];
	// Xóa phòng ban
	$sql = "DELETE FROM phongban WHERE maphongban = ?";
	$params = array($mPB);
	$stmt = sqlsrv_prepare($conn, $sql, $params);

	if (sqlsrv_execute($stmt)) {
        ?>
        <script>
            alert('Xóa thành công!');
            window.location.href = 'DSphongban.php';
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
	echo "Lỗi: maphongban parameter is not set";
}
?>