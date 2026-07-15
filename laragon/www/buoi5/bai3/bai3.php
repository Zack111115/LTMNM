<?php
require '../db.php';
$sql = "
    SELECT c.category_name, COUNT(p.product_id) AS total_products
    FROM categories c
    JOIN products p ON c.category_id = p.category_id
    GROUP BY c.category_name
    HAVING COUNT(p.product_id) > 3
";
renderTable($pdo, "Bài 03: Tìm loại hàng có trên 5 sản phẩm", $sql);
?>