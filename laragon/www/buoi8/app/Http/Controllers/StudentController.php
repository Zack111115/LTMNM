<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Lấy danh sách sinh viên kèm theo thông tin khóa học
        $students = Student::with('courses')->paginate(10);
        
        return view('students.index', compact('students'));
    }
}