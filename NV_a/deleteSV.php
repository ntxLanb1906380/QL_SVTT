<?php
/* Database connection start */
include "connect.php" ?>

<?php
if (isset($_GET['mssv'])) {
	$mssv = $_GET["mssv"];
	// Xóa sinh viên
	$sql = "DELETE FROM sinhvien WHERE mssv = ?";
	$params = array($mssv);
	$stmt = sqlsrv_prepare($conn, $sql, $params);

	if (sqlsrv_execute($stmt)) {
		header('location: DSSV.php');
		//var_dump($stmt);
	} else {
		$loi = sqlsrv_errors();
		foreach ($errors as $error) {
			echo "Error: " . $error['message'];
		}
	}

	sqlsrv_free_stmt($stmt);
	sqlsrv_close($conn);
} else {
	echo "Lỗi: mssv parameter is not set";
}
?>