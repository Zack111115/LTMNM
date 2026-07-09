<?php
namespace App\Students;

class Student extends Person {
    private $studentID;

    public function __construct($name, $age, $studentID) {
        parent::__construct($name, $age);
        $this->studentID = $studentID;
    }

    public function showInfo() {
        echo "Sinh viên: {$this->name} | Tuổi: {$this->age} | MSSV: {$this->studentID} <br>";
    }
}