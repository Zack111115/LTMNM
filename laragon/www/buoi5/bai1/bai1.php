<?php
require '../db.php';
$sql = "
    SELECT c.category_name, COUNT(p.product_id) AS total_products
    FROM categories c
    LEFT JOIN products p ON c.category_id = p.category_id
    GROUP BY c.category_name
";
renderTable($pdo, "Bài 01: Thống kê số lượng sản phẩm trong từng loại hàng", $sql);
?>