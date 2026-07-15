<?php
require '../db.php';
$sql = "
    SELECT c.customer_id, c.name, SUM(od.quantity) AS total_items
    FROM customers c
    JOIN orders o ON c.customer_id = o.customer_id
    JOIN order_details od ON o.order_id = od.order_id
    GROUP BY c.customer_id, c.name
    ORDER BY total_items DESC
    LIMIT 1
";
renderTable($pdo, "Bài 07: Khách hàng mua nhiều sản phẩm nhất", $sql);
?>