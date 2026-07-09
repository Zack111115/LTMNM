<?php
if (isset($_POST['n'])) {
    $n = (int)$_POST['n'];
    $sum = 0;
    for ($i = 1; $i <= $n; $i++) {
        $sum += $i;
    }
    echo "Tổng các số từ 1 đến $n là: $sum";
}
?>
<form method="post">
    Nhập số N: <input type="number" name="n" min="1" required>
    <input type="submit" value="Tính tổng">
</form>