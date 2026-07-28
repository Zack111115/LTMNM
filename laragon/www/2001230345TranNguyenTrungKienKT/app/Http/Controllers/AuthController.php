<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Hiển thị trang đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 2. Xử lý dữ liệu khi submit form
    public function login(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Biến $remember để kiểm tra xem user có tích vào ô "Ghi nhớ" không
        $remember = $request->has('remember');

        // Thực hiện kiểm tra đăng nhập bằng Auth::attempt
        if (Auth::attempt($credentials, $remember)) {
            // Đăng nhập thành công, tạo lại session để bảo mật
            $request->session()->regenerate();

            // Chuyển hướng vào trang quản lý admin (đổi lại link nếu bạn dùng route khác)
            return redirect()->intended('/admin/products');
        }

        // Đăng nhập thất bại, quay lại form và báo lỗi ở trường email
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('email');
    }

    // 3. Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}