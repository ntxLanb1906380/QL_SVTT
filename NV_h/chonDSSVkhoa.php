<!DOCTYPE html>
<html>

<head>
	<title>Chọn xem ds sv khóa</title>
</head>

<body>
	<style>
		.a {
			background-color: yellowgreen;
			text-align: center;
		}

		.b {
			background-color: green;
			text-align: right;
		}

		#c {
			margin: 5px;
		}
	</style>

	<h2>Xem danh sách sinh viên khóa</h2>
	<div class="a"></br>
		<select id="makhoa" name="makhoa">
			<?php

			include "connect.php";
			//Tạo câu truy vấn để lấy mã khóa thực tập
			$sql = "SELECT * FROM khoaTT";
			$stmt = sqlsrv_query($conn, $sql);
			if ($stmt === false) {
				die(print_r(sqlsrv_errors(), true));
			}
			while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
				echo "<option value='" . $row['makhoa'] . "'>" . $row['makhoa'] . " ( " . $row['ngayBD']->format('d-m-Y') . " - " . $row['ngayKT']->format('d-m-Y') . " )</option>";
			}
			sqlsrv_free_stmt($stmt);
			?>
		</select> <br /><br />
	</div>
	<div class="b">
		<button type="button" onclick="myFunction()" id="c">Xem</button>
	</div>
</body>

</html>
<script>
	function myFunction() {
		var selectedValue = document.getElementById("makhoa").value;
		location.replace("DSSVhuongdan.php?makhoa=" + selectedValue);
	} 
</script>
