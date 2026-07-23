<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Ghi đè hàm này để mock (giả lập) việc tìm dữ liệu không qua DB
    public function resolveRouteBinding($value, $field = null)
    {
        $mockData = [
            1 => ['id' => 1, 'title' => 'Giới thiệu Laravel 12', 'body' => 'Nội dung A'],
            2 => ['id' => 2, 'title' => 'Blade Components', 'body' => 'Nội dung B'],
        ];

        // Nếu ID tồn tại trong mảng, tạo object và nhét dữ liệu vào
        if (isset($mockData[$value])) {
            $article = new self();
            $article->forceFill($mockData[$value]);
            return $article;
        }

        // Báo lỗi 404 nếu không tìm thấy
        abort(404);
    }
}