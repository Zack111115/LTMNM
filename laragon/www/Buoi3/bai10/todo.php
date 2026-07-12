<?php
$file = 'todos.json';

if (isset($_POST['data'])) {
    file_put_contents($file, $_POST['data']);
    echo "Đã lưu";
} else {
    if (file_exists($file)) {
        echo file_get_contents($file);
    } else {
        echo "[]";
    }
}
?>