<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $productNames = [
            'Bàn phím cơ Logitech G Pro',
            'Chuột không dây Razer DeathAdder',
            'Màn hình Dell UltraSharp 24 inch',
            'Tai nghe Bluetooth Sony WH-1000XM4',
            'Máy tính xách tay ThinkPad T14',
            'Ổ cứng SSD Samsung 1TB',
            'Card màn hình RTX 3060',
            'Ram Corsair Vengeance 16GB',
            'Bàn di chuột SteelSeries',
            'Webcam Logitech C920'
        ];

        return [
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id ?? \App\Models\Category::factory(),
            'name' => $this->faker->unique()->randomElement($productNames),
            'price' => $this->faker->randomFloat(2, 100, 5000),
            'description' => 'Đây là mô tả chi tiết của sản phẩm bằng tiếng Việt...',
            'image_path' => 'products/images/sample.jpg',
            'document_path' => 'products/documents/sample.pdf',
            'status' => $this->faker->randomElement(['draft', 'published']),
        ];
    }
}