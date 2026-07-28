<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Chuyển hướng trang chủ sang form login
Route::redirect('/', '/login');

// Các đường dẫn cho tính năng đăng nhập/đăng xuất
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


use App\Http\Controllers\ProductAdminController;

// Bọc middleware auth để bảo vệ thư mục admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    
    // Các route cho tính năng mở rộng
    Route::get('products/trash', [ProductAdminController::class, 'trash'])->name('products.trash');
    Route::post('products/{id}/restore', [ProductAdminController::class, 'restore'])->name('products.restore');
    Route::delete('products/{id}/force-delete', [ProductAdminController::class, 'forceDelete'])->name('products.forceDelete');
    Route::get('products/{id}/download', [ProductAdminController::class, 'downloadDocument'])->name('products.download');
    Route::post('/products/import', [ProductAdminController::class, 'import'])->name('products.import');

    // Route CRUD cơ bản
    Route::resource('products', ProductAdminController::class);
});