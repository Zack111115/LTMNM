<?php
// Gọi file autoload để tự động tìm và nạp class
require 'autoload.php';

// Khai báo sử dụng class Student từ namespace App\Students
use App\Students\Student;

// Khởi tạo đối tượng
$student1 = new Student("Trung Kiên", 21, "2001230345");
$student1->showInfo();
?>