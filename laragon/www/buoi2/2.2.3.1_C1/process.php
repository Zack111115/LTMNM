<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $username = $_POST['username'];
    
    echo "<h3>Xin chào " . htmlspecialchars($username) . "! Dữ liệu đã được xử lý thành công.</h3>";
    echo '<br><a href="index.html">Quay lại form</a>';
} else {
    echo "Vui lòng truy cập từ form.";
}
?>