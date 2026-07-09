<?php
// Khởi tạo mảng sinh viên
$danhSachSV = [
    ['hoten' => 'Nguyễn Văn A', 'diem' => 7.5],
    ['hoten' => 'Trần Thị B', 'diem' => 9.2],
    ['hoten' => 'Lê Văn C', 'diem' => 8.0]
];

// Hàm tìm sinh viên điểm cao nhất
function timSVThangDiemCaoNhat($danhSach) {
    if (empty($danhSach)) return null;
    
    $svMax = $danhSach[0];
    foreach ($danhSach as $sv) {
        if ($sv['diem'] > $svMax['diem']) {
            $svMax = $sv;
        }
    }
    return $svMax;
}

$svXuatSac = timSVThangDiemCaoNhat($danhSachSV);
echo "Sinh viên có điểm cao nhất là: {$svXuatSac['hoten']} với {$svXuatSac['diem']} điểm.";
?>