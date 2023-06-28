<?php
/* Database connection start */
include "connect.php" ?>

<?php
if (isset($_GET['matr'])) {
	$mtr = $_GET["matr"];
	// Xóa sinh viên
	$sql = "DELETE FROM truong WHERE matruong = ?";
	$params = array($mtr);
	$stmt = sqlsrv_prepare($conn, $sql, $params);

	if (sqlsrv_execute($stmt)) {
        ?>
        <script>
            alert('Xóa thành công!');
            window.location.href = 'DStruong.php';
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
	echo "Lỗi: matruong parameter is not set";
}
?>