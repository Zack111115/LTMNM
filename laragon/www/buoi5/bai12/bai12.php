<?php
require '../db.php';
$sql = "
    SELECT p.name, COUNT(od.order_id) AS order_count
    FROM products p
    LEFT JOIN order_details od ON p.product_id = od.product_id
    GROUP BY p.product_id, p.name
";
renderTable($pdo, "Bài 12: Liệt kê tất cả sản phẩm và số lần được đặt hàng", $sql);
?>