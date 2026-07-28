<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Tạo tài khoản Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
            ]
        );

        // 2. Định nghĩa đúng 3 danh mục và 10 sản phẩm
        $data = [
            'Linh kiện máy tính' => [
                'Ổ cứng SSD Samsung 1TB', 
                'Ram Corsair Vengeance 16GB', 
                'Card màn hình RTX 3060',
                'Bo mạch chủ ASUS ROG'
            ],
            'Thiết bị văn phòng' => [
                'Máy tính xách tay ThinkPad T14', 
                'Màn hình Dell UltraSharp 24 inch', 
                'Webcam Logitech C920'
            ],
            'Phụ kiện ngoại vi' => [
                'Bàn phím cơ Logitech G Pro', 
                'Chuột không dây Razer DeathAdder', 
                'Tai nghe Bluetooth Sony WH-1000XM4'
            ]
        ];

        // 3. Chạy dữ liệu
        foreach ($data as $catName => $products) {
            $category = Category::create([
                'name' => $catName,
                'slug' => Str::slug($catName)
            ]);

            foreach ($products as $prodName) {
                Product::factory()->create([
                    'category_id' => $category->id,
                    'name' => $prodName,
                ]);
            }
        }
    }
}