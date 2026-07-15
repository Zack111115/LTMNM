<?php
require '../db.php';
$sql = "
    SELECT p.name, SUM(od.quantity) AS total_sold
    FROM products p
    JOIN order_details od ON p.product_id = od.product_id
    GROUP BY p.product_id, p.name
    ORDER BY total_sold DESC
    LIMIT 3
";
renderTable($pdo, "Bài 09: Tìm 3 sản phẩm bán chạy nhất", $sql);
?>