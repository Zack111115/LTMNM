<?php
require '../db.php';
$sql = "
    SELECT c.category_name, p.name, p.price
    FROM products p
    JOIN categories c ON p.category_id = c.category_id
    WHERE p.price = (
        SELECT MAX(p2.price)
        FROM products p2
        WHERE p2.category_id = p.category_id
    )
";
renderTable($pdo, "Bài 05: Tìm sản phẩm có giá cao nhất trong từng loại hàng", $sql);
?>