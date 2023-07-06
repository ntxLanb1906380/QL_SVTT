<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style2.css">
	<meta charset="UTF-8">
	<title>
		Sửa thông tin nhân viên
	</title>
</head>

<body>
	<!-- connect database -->
	<?php include "connect.php" ;

	//Bắt đầu session
    session_start();
	$idcb = $_GET['idnvhd'];

    //lưu biến idnv vào session
    $_SESSION["idnvhd"] = $idcb;

	$sql = "SELECT * FROM nhanvien where id = ? ";
	$params = array($idcb);
	$result = sqlsrv_query($conn, $sql, $params);
	if ($result === false) {
		die(print_r(sqlsrv_errors(), true));
	}
	
	//in danh sách dữ liệu
	while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
		$mnv = $row["manv"];
		$hten = $row["hoten"];
		$sdt = $row["sdt"];
		$dchi = $row["diachi"];
		$chvu = $row["chucvu"];
		$email = $row["email"];
		$gtinh = $row["gioitinh"];
		$mpb = $row["maphongban"];
		$currentMapb = $row['maphongban'];
		$pw = $row["matkhau"];
		$ngsinh = $row["ngaysinh"];
		$ngsinh_dmy = $ngsinh->format('Y-m-d');

		
	}
	
	?>

	<form method="post" action="xulySuaNV.php" class="form">
		<h2>Sửa thông tin nhân viên</h2>
		Id:<?php echo $idcb; ?><br />

		Mã nhân viên:<?php echo $mnv; ?><br />

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
		<?php
		if ($gtinh === 'Nam') {
			?>
			<input type="radio" id="gtinh1" name="gtinh" value="Nam" checked>;
			<label for="html">Nam</label>
			<input type="radio" id="gtinh2" name="gtinh" value="Nữ">
			<label for="css">Nữ</label>
		<?php
		} else if ($gtinh === 'Nữ') {
			?>
				<input type="radio" id="gtinh1" name="gtinh" value="Nam">
				<label for="html">Nam</label>
				<input type="radio" id="gtinh2" name="gtinh" value="Nữ" checked>
				<label for="css">Nữ</label>
				<?php
		} else {
			?>
				<input type="radio" id="gtinh1" name="gtinh" value="Nam">
				<label for="html">Nam</label>
				<input type="radio" id="gtinh2" name="gtinh" value="Nữ">
				<label for="css">Nữ</label>
				<?php
		}
		?><br>

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

		Mật khẩu: <input type="password" name="pwd" value="" class="d"><br />
		<input type="hidden" name="pw" value="<?php echo $pw; ?>" class="d">
		<br /><br />
		<input type="submit" name="saveNV" value="Lưu thông tin đã sửa" class="a" />
		<br />
		<input type="reset" name="reset" value="Reset" class="a" />
	</form>
</body>

</html>
