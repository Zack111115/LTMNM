<?php
$host = "localhost";
$dbname = "lab3_shop";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// Hàm hỗ trợ in bảng HTML
function renderTable($pdo, $title, $sql) {
    echo "<div style='font-family: Arial, sans-serif; margin: 20px;'>";
    echo "<h3 style='color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 5px;'>$title</h3>";
    try {
        $stmt = $pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rows) > 0) {
            echo "<table border='1' style='border-collapse: collapse; width: 100%; text-align: left;'>";
            echo "<tr style='background-color: #f2f2f2;'>";
            foreach (array_keys($rows[0]) as $col) {
                echo "<th style='padding: 8px;'>" . htmlspecialchars($col) . "</th>";
            }
            echo "</tr>";
            foreach ($rows as $row) {
                echo "<tr>";
                foreach ($row as $data) {
                    echo "<td style='padding: 8px;'>" . htmlspecialchars($data ?? 'NULL') . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Không có dữ liệu.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Lỗi truy vấn: " . $e->getMessage() . "</p>";
    }
    echo "</div>";
}
?>