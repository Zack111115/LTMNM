<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:200',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|gt:0',
            'image_up' => 'nullable|image|mimes:jpg,png,webp|max:20',
            'document_up' => 'nullable|file|mimes:pdf,doc,docx|max:50',
            'status' => 'required|in:draft,published',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự hợp lệ.',
            'name.max' => 'Tên sản phẩm không được dài quá 200 ký tự.',
            
            'category_id.required' => 'Vui lòng chọn danh mục cho sản phẩm.',
            'category_id.exists' => 'Danh mục bạn chọn không tồn tại trong hệ thống.',
            
            'price.required' => 'Vui lòng nhập giá sản phẩm.',
            'price.numeric' => 'Giá sản phẩm bắt buộc phải là số.',
            'price.gt' => 'Giá sản phẩm phải lớn hơn 0.',
            
            'image_up.image' => 'File tải lên bắt buộc phải là hình ảnh.',
            'image_up.mimes' => 'Hình ảnh chỉ chấp nhận các đuôi jpg, png, hoặc webp.',
            'image_up.max' => 'Dung lượng ảnh không được vượt quá 20KB.',
            
            'document_up.file' => 'File tải lên phải là một tệp tài liệu hợp lệ.',
            'document_up.mimes' => 'Tài liệu chỉ chấp nhận các định dạng pdf, doc, hoặc docx.',
            'document_up.max' => 'Dung lượng tài liệu đính kèm không được vượt quá 50KB.',
            
            'status.required' => 'Vui lòng chọn trạng thái cho sản phẩm.',
            'status.in' => 'Trạng thái sản phẩm chỉ có thể là bản nháp (draft) hoặc đã xuất bản (published).',
        ];
    }
}