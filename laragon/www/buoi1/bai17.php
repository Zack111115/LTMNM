<?php
function inHoaChuoi($chuoi) {
    // Dùng mb_strtoupper để hỗ trợ tốt tiếng Việt có dấu
    return mb_strtoupper($chuoi, 'UTF-8');
}

$chuoiGoc = "chào mừng bạn đến với php";
echo "Chuỗi gốc: $chuoiGoc <br>";
echo "Chuỗi viết hoa: " . inHoaChuoi($chuoiGoc);
?>