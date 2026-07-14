<?php
require '../bai1/connect.php';

// Xác định cột cần sắp xếp và hướng sắp xếp từ URL (mặc định là id)
$column = isset($_GET['sort']) ? $_GET['sort'] : 'id';
$order = isset($_GET['dir']) && strtolower($_GET['dir']) == 'desc' ? 'DESC' : 'ASC';

// Giới hạn các cột được phép sắp xếp để chống lỗi SQL
$allowed_columns = ['id', 'name', 'email'];
if (!in_array($column, $allowed_columns)) {
    $column = 'id';
}

// Chuẩn bị và thực thi câu truy vấn
$sql = "SELECT * FROM students ORDER BY $column $order";
$stmt = $conn->prepare($sql);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>
            Họ tên 
            <a href="?sort=name&dir=asc">▲</a> 
            <a href="?sort=name&dir=desc">▼</a>
        </th>
        <th>
            Email 
            <a href="?sort=email&dir=asc">▲</a> 
            <a href="?sort=email&dir=desc">▼</a>
        </th>
        <th>SĐT</th>
    </tr>
    <?php foreach ($students as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><a href="../bai5/delete_student.php?id=<?= $row['id'] ?>" onclick="return confirm('Xóa?')">Xóa</a></td>
            <td><a href="../bai6/edit_student.php?id=<?= $row['id'] ?>">Sửa</a></td>
        </tr>
    <?php endforeach; ?>
</table>