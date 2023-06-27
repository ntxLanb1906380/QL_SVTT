<?php
//khởi tạo session
session_start();
include "connect.php";
$idnv = $_GET["id"];

//lưu biến idnv vào session
$_SESSION["idnv"] = $idnv;
?>

<a href="chonDSSVkhoa.php">Xem danh sách sinh viên hướng dẫn</a>
<?php
//khởi tạo session
session_start();

//lấy biến idnv từ session
$idnv = $_SESSION["idnv"];

//sử dụng biến idnv 
//...
?>
