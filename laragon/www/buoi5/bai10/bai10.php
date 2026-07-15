<?php
require '../db.php';
$sql = "
    SELECT c.name, SUM(od.quantity * od.price) AS total_spent
    FROM customers c
    JOIN orders o ON c.customer_id = o.customer_id
    JOIN order_details od ON o.order_id = od.order_id
    GROUP BY c.customer_id, c.name
    ORDER BY total_spent DESC
    LIMIT 5
";
renderTable($pdo, "Bài 10: Liệt kê 5 khách hàng chi tiêu nhiều nhất", $sql);
?>