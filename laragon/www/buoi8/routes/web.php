<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // Thêm dòng này để gọi Controller
Route::get('/', function () {
    return view('welcome');
});

// Thêm route cho trang products
Route::resource('products', App\Http\Controllers\ProductController::class);

use App\Http\Controllers\StudentController;
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);

Route::get('/advanced', [ProductController::class, 'advanced']);