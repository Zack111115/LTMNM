<?php
require '../db.php';
$sql = "
    SELECT c.category_name, SUM(od.quantity * od.price) AS total_revenue
    FROM categories c
    JOIN products p ON c.category_id = p.category_id
    JOIN order_details od ON p.product_id = od.product_id
    GROUP BY c.category_id, c.category_name
    ORDER BY total_revenue DESC
    LIMIT 1
";
renderTable($pdo, "Bài 11: Tìm loại hàng có doanh thu cao nhất", $sql);
?>