<?php
$file_path = 'note.txt';

// Xử lý lưu nội dung nếu có gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['noidung'])) {
    $noidung = trim($_POST['noidung']) . PHP_EOL;
    file_put_contents($file_path, $noidung, FILE_APPEND);
    echo "<p style='color:green;'>Đã lưu nội dung!</p>";
}
?>

<form method="post">
    Nhập nội dung: <input type="text" name="noidung" required>
    <input type="submit" value="Lưu vào note.txt">
</form>

<hr>
<h3>Nội dung đã lưu:</h3>
<?php
if (file_exists($file_path)) {
    // Đọc file và dùng nl2br để giữ định dạng xuống dòng
    echo nl2br(htmlspecialchars(file_get_contents($file_path)));
} else {
    echo "Chưa có dữ liệu.";
}
?>