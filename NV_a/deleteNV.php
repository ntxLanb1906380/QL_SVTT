<?php 
/* Database connection start */
include "connect.php" ?>

<?php
$id = $_GET['id'];
// Xóa nhân viên
$sql = "DELETE FROM nhanvien WHERE id = ?";
$params = array($id);
$stmt = sqlsrv_prepare($conn, $sql, $params);

if (sqlsrv_execute($stmt)) {
	header('location: DSNV.php');
	// echo "Xong";
} else {
	$loi = sqlsrv_errors();
	foreach ($errors as $error) {
		echo "Error: " . $error['message'];
	}
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>