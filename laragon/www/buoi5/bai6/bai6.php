<?php
require '../db.php';
$sql = "
    SELECT p.product_id, p.name
    FROM products p
    LEFT JOIN order_details od ON p.product_id = od.product_id
    WHERE od.product_id IS NULL
";
renderTable($pdo, "Bài 06: Liệt kê sản phẩm chưa từng được đặt hàng", $sql);
?>