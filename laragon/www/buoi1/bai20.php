<?php
// Xử lý khi người dùng gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['ten'])) {
    $ten = $_POST['ten'];
    // Lưu cookie trong 1 giờ (3600 giây)
    setcookie('username', $ten, time() + 3600, '/');
    // Tải lại trang để cookie có hiệu lực
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Xử lý nút xóa tên
if (isset($_GET['xoa'])) {
    setcookie('username', '', time() - 3600, '/');
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<?php if (isset($_COOKIE['username'])): ?>
    <h2>Chào mừng lại, <?= htmlspecialchars($_COOKIE['username']) ?>!</h2>
    <a href="?xoa=1">Xóa tên và nhập lại</a>
<?php else: ?>
    <form method="post">
        Bạn tên là gì? <input type="text" name="ten" required>
        <input type="submit" value="Lưu tên">
    </form>
<?php endif; ?>