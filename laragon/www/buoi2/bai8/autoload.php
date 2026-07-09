<?php
spl_autoload_register(function ($class) {
    // Chuyển đổi dấu \ trong namespace thành dấu / của thư mục
    $path = str_replace("\\", "/", $class) . ".php";
    
    if (file_exists($path)) {
        require $path;
    }
});
?>