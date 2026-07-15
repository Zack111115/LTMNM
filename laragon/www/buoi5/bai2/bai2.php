<?php
require '../db.php';
$sql = "
    SELECT o.order_date, SUM(od.quantity * od.price) AS total_revenue
    FROM orders o
    JOIN order_details od ON o.order_id = od.order_id
    GROUP BY o.order_date
";
renderTable($pdo, "Bài 02: Tính tổng doanh thu từng ngày", $sql);
?>