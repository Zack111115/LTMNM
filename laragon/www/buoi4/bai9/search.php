<form method="get" action="">
    <input type="text" name="keyword" placeholder="Nhập tên sinh viên...">
    <button type="submit">Tìm kiếm</button>
</form>

<?php
// Xử lý PHP
require '../bai1/connect.php';

$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$sql = "SELECT * FROM students WHERE name LIKE :keyword";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':keyword', "%$keyword%", PDO::PARAM_STR);
$stmt->execute();

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>SĐT</th>
    </tr>
    <?php foreach ($students as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><a href="../bai5/delete_student.php?id=<?= $row['id'] ?>" onclick="return
confirm('Xóa?')">Xóa</a></td>
            <td><a href="../bai6/edit_student.php?id=<?= $row['id'] ?>">Sửa</a></td>
        </tr>
    <?php endforeach; ?>
</table>