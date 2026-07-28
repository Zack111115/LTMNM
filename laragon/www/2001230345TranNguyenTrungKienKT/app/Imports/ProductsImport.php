<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Chú ý: Các key 'category_id', 'name', 'price'... phải khớp với tên cột ở dòng đầu tiên trong file Excel
        return new Product([
            'category_id' => $row['category_id'] ?? 1,
            'name'        => $row['name'],
            'price'       => $row['price'] ?? 0,
            'description' => $row['description'] ?? null,
            'status'      => $row['status'] ?? 'Draft',
        ]);
    }
}