@extends('admin.layouts.main')

@section('content')
<h3>Thêm sản phẩm mới</h3>
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label">Danh mục <span class="text-danger">*</span></label>
            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Giá <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
            @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Trạng thái <span class="text-danger">*</span></label>
            <select name="status" class="form-select @error('status') is-invalid @enderror">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Bản nháp (Draft)</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Đã xuất bản (Published)</option>
            </select>
            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Ảnh đại diện</label>
            <input type="file" name="image_up" class="form-control @error('image_up') is-invalid @enderror">
            @error('image_up') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Tài liệu đính kèm (PDF, DOCX)</label>
            <input type="file" name="document_up" class="form-control @error('document_up') is-invalid @enderror">
            @error('document_up') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection