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
	<?php include "connect.php" ?>

	<?php
	//get data
	$id = $_GET['id'];
	$sql = "SELECT * FROM nhanvien where id = ? ";
	$params = array($id);
	$result = sqlsrv_query($conn, $sql, $params);


	//in danh sách dữ liệu
	while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
		$id = $row["id"];
		$mnv = $row["manv"];
		$hten = $row["hoten"];
		$ngsinh = $row["ngaysinh"];
		$sdt = $row["sdt"];
		$dchi = $row["diachi"];
		$chvu = $row["chucvu"];
		$email = $row["email"];
		$gtinh = $row["gioitinh"];
		$mpb = $row["maphongban"];
		$pw = $row["matkhau"];
	}
	?>

	<form method="post" action="xulySuaNV.php" class="form">
		<h2>Sửa thông tin nhân viên</h2>
		Id:
		<input type="text" name="id" value="<?php echo $id; ?>" required class="d"><br />
		Mã nhân viên:
		<input type="text" name="mnv" value="<?php echo $mnv; ?>" required class="d"><br />
		Họ tên:
		<input type="text" name="hoten" value="<?php echo $hten; ?>" required class="d"><br />
		Ngày sinh:
		<input type="date" name="ngsinh" value="<?php echo $ngsinh ->format('d-m-Y'); ?>" required class="d"><br />
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
			<option value="<?php echo $mpb; ?>"><?php echo $mpb; ?></option>
			<option value="1"> 1 (Ban giám đốc)</option>
			<option value="2"> 2 (Phòng kinh doanh)</option>
			<option value="3"> 3 (Phòng giải pháp)</option>
			<option value="4"> 4 (Tổ tổng hợp - Phòng kinh doanh)</option>
			<option value="5"> 5 (Tổ triển khai - chăm sóc khách hàng (CSKH) - Phòng kinh doanh)</option>
			<option value="6"> 6 (Tổ văn thư TTCNTT - Phòng kinh doanh)</option>
			<option value="7"> 7 (Tổ giải pháp CQS - Phòng giải pháp)</option>
			<option value="8"> 8 (Tổ quản trị hệ thống CNTT - Phòng giải pháp)</option>
			<option value="9"> 9 (Tổ camera - Phòng giải pháp)</option>
			<option value="10"> 10 (Tổ nghiên cứu và phát triển (R&D) - Phòng giải pháp)</option>
			<option value="11"> 11 (Tổ hệ thống thông tin địa lý (Gis) - Phòng giải pháp)</option>
			<option value="12"> 12 (Tổ thanh tra, khiểu nại, tố cáo - Phòng giải pháp)</option>
		</select> <br /><br />

		Mật khẩu: <input type="password" name="pw" value="" required class="d"><br />
		Nhập lại mật khẩu: <input type="password" name="pw" required value="" class="d"><br />
		<br /><br />
		<input type="submit" name="saveNV" value="Lưu thông tin đã sửa" class="a" />
		<br />
		<input type="reset" name="reset" value="Reset" class="a" />
		<?php require 'xulySuaNV.php'; ?>
	</form>


</body>

</html>
