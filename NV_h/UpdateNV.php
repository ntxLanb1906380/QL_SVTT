<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style2.css">
	<meta charset="UTF-8">
	<title>
		Cập nhật thông tin cá nhân
	</title>
</head>

<body>
	<!-- connect database -->
	<?php include "connect.php" ;

	//get data
    session_start();
    $id = $_SESSION["idnv"]; 
	
	$sql = "SELECT * FROM nhanvien where id = ? ";
	$params = array($id);
	$result = sqlsrv_query($conn, $sql, $params);
	if ($result === false) {
		die(print_r(sqlsrv_errors(), true));
	}

	//in danh sách dữ liệu
	while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
		$id = $row["id"];
		$mnv = $row["manv"];
		$hten = $row["hoten"];
		$sdt = $row["sdt"];
		$dchi = $row["diachi"];
		$chvu = $row["chucvu"];
		$email = $row["email"];
		$gtinh = $row["gioitinh"];
		$mpb = $row["maphongban"];
		$currentMapb = $row['maphongban'];
		$ngsinh = $row["ngaysinh"];
		$ngsinh_dmy = $ngsinh->format('Y-m-d');

		
	}
	
	?>

	<form method="post" action="xulyUpdateNV.php" class="form">
		<h2>CẬP NHẬT THÔNG TIN CÁ NHÂN</h2>
		Id:
		<?php echo $id; ?></br>
		Mã nhân viên:
		<?php echo $mnv; ?></br>
		Họ tên:
		<input type="text" name="hoten" value="<?php echo $hten; ?>" required class="d"><br />
		Ngày sinh:
		<input type="date" name="ngsinh" value="<?php echo $ngsinh_dmy; ?>" required class="d">
		Số điện thoại:
		<input type="tel" name="sdt" value="<?php echo $sdt; ?>" required class="d"><br />
		Địa chỉ:
		<input type="text" name="dchi" value="<?php echo $dchi; ?>" required class="d"><br />
		Chức vụ: <br />

		<select id="chucvu" name="chucvu">
			<option value="<?php echo $chvu; ?>"><?php echo $chvu; ?></option>
			<option value="Nhân viên admin"> Nhân viên admin</option>
			<option value="Nhân viên"> Nhân viên</option>
			<option value="Phó giám đốc"> Phó giám đốc</option>
			<option value="Giám đốc"> Giám đốc</option>
		</select> <br /><br />

		Email: <input type="email" name="email" value="<?php echo $email; ?>" required class="d"><br />

		Giới tính: <br />

		<input type="radio" id="gtinh1" name="gtinh" value="Nam" checked>
		<label for="html">Nam</label>
		<input type="radio" id="gtinh2" name="gtinh" value="Nữ">
		<label for="css">Nữ</label><br>

		Mã phòng ban: <select id="mapb" name="mapb">
			<?php
			//Tạo câu truy vấn để lấy mã phòng ban
			$tsql = "SELECT maphongban, tenphongban FROM phongban";
			$stmt = sqlsrv_query($conn, $tsql);
			if ($stmt === false) {
				die(print_r(sqlsrv_errors(), true));
			}
			while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
				$selected = ($row['maphongban'] == $currentMapb) ? 'selected' : '';
				echo "<option value='" . $row['maphongban'] . "' $selected>" . $row['maphongban'] . " - " . $row['tenphongban'] . "</option>";
			}
			sqlsrv_free_stmt($stmt);
			?>
		</select> <br /><br />

		<input type="submit" name="saveNV" value="Lưu thông tin đã sửa" class="a" />
		<br />
		<input type="reset" name="reset" value="Reset" class="a" />
	</form>
</body>
</html>