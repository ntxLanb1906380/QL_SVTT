<style>
    .khoa {
        font-weight: bold;
        cursor: pointer;
    }
    .sinhvien-container {
        display: none;
    }
    .active {
        display: block !important;
    }
</style>

<?php include "connect.php";

$query = "SELECT DISTINCT makhoa FROM khoaTT";
$result = sqlsrv_query($conn, $query);

if ($result) {
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $makhoa = $row['makhoa'];
        echo "<h3 class='khoa' onclick=\"toggleKhoa('$makhoa')\">Khoa $makhoa</h3>";
        echo "<ul class='sinhvien-container' id='khoa-$makhoa'>";
        
        $query2 = "SELECT sinhvien.mssv, sinhvien.hoten, nhanvien.MaNV, nhanvien.hoten AS NV_HoTen
                  FROM sinhvien
                  LEFT JOIN nhanvien ON sinhvien.id = nhanvien.id
                  WHERE sinhvien.makhoa = '$makhoa'
                  ORDER BY nhanvien.hoten, sinhvien.hoten";
        $result2 = sqlsrv_query($conn, $query2);
        
        if ($result2) {
            $current_nhanvien = "";
            while ($row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)) {
                $mssv = $row2['mssv'];
                $hoten_sv = $row2['hoten'];
                $manv = $row2['MaNV'];
                $hoten_nv = $row2['NV_HoTen'];
                
                // Nếu mã nhân viên hiện tại khác với mã nhân viên trước đó, bắt đầu một danh sách mới cho nhân viên này
                if ($manv != "" && $manv != $current_nhanvien) {
                    if ($current_nhanvien != "") {
                        echo "</ul>";
                    }
                    echo "<li><strong>$hoten_nv hướng dẫn:</strong></li>";
                    echo "<ul>";
                    
                    $current_nhanvien = $manv;
                }
                
                // Hiển thị thông tin sinh viên
                echo "<li>$mssv: $hoten_sv</li>";
            }
            
            // Kết thúc danh sách sinh viên và danh sách nhân viên hướng dẫn cuối cùng
            if ($current_nhanvien != "") {
                echo "</ul>";
            }
        } else {
            echo "Lỗi: " . sqlsrv_errors();
        }
        
        echo "</ul>";
    }
} else {
    echo "Lỗi: " . sqlsrv_errors();
}

if (is_resource($result)) {
    sqlsrv_free_stmt($result);
}
sqlsrv_close($conn);
?>

<script>
    // function to toggle khoa
    function toggleKhoa(makhoa) {
        document.getElementById(`khoa-${makhoa}`).classList.toggle('active');
    }
</script>
