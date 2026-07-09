<?php
// Kiểm tra dữ liệu POST được gửi từ JavaScript lên
if (isset($_POST['name']) && isset($_POST['age'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    
    // Xử lý và trả về chuỗi text kết quả giống hệt ảnh tài liệu
    // (Sử dụng htmlspecialchars để bảo mật chống XSS)
    echo "Xin chào " . htmlspecialchars($name) . ", bạn " . htmlspecialchars($age) . " tuổi.";
} else {
    echo "Dữ liệu gửi lên không hợp lệ.";
}
?>