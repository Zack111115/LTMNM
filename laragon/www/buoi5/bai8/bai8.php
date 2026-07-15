<?php
require '../db.php';
$sql = "
    SELECT c.category_name, SUM(od.quantity) AS total_quantity, SUM(od.quantity * od.price) AS total_revenue
    FROM categories c
    JOIN products p ON c.category_id = p.category_id
    JOIN order_details od ON p.product_id = od.product_id
    GROUP BY c.category_id, c.category_name
";
renderTable($pdo, "Bài 08: Thống kê tổng số lượng và doanh thu của từng loại sản phẩm", $sql);
?>