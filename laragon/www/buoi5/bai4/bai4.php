<?php
require '../db.php';
$sql = "
    SELECT c.customer_id, c.name, SUM(od.quantity * od.price) AS total_spent
    FROM customers c
    JOIN orders o ON c.customer_id = o.customer_id
    JOIN order_details od ON o.order_id = od.order_id
    GROUP BY c.customer_id, c.name
    HAVING total_spent > 1000000
";
renderTable($pdo, "Bài 04: Danh sách khách hàng và tổng tiền đã mua (>1.000.000)", $sql);
?>