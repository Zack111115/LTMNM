<?php
header('Content-Type: application/json');

// Giả lập dữ liệu tỷ giá
$rates = [
    ["currency" => "USD", "buy" => 25200, "sell" => 25500],
    ["currency" => "EUR", "buy" => 27100, "sell" => 27600],
    ["currency" => "JPY", "buy" => 165, "sell" => 170]
];

echo json_encode([
    "time" => date("H:i:s d/m/Y"),
    "rates" => $rates
]);
?>