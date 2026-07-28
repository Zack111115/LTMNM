@extends('admin.layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Danh sách sản phẩm</h3>
    <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <a href="{{ route('admin.products.trash') }}" class="btn btn-secondary me-2">Thùng rác</a>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Thêm mới</a>
        <form action="{{ route('admin.products.import') }}" method="POST" enctype="multipart/form-data" class="d-inline-block me-2">
    @csrf
    <div class="input-group">
        <input type="file" name="excel_file" class="form-control form-control-sm" required accept=".xlsx, .xls, .csv">
        <button type="submit" class="btn btn-success btn-sm">Tải lên Excel</button>
    </div>
</form>
    </div>
    
</div>
</div>

<!-- Form Lọc -->
<form method="GET" action="{{ route('admin.products.index') }}" class="row g-2 mb-4">
    <div class="col-md-4">
        <input type="text" name="keyword" class="form-control" placeholder="Tên sản phẩm..." value="{{ request('keyword') }}">
    </div>
    <div class="col-md-3">
        <select name="category_id" class="form-select">
            <option value="">-- Tất cả danh mục --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <select name="status" class="form-select">
            <option value="">-- Tất cả trạng thái --</option>
            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Bản nháp</option>
            <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Đã xuất bản</option>
        </select>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-secondary w-100">Lọc dữ liệu</button>
    </div>
</form>

<!-- Bảng dữ liệu -->
<table class="table table-bordered table-hover align-middle">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th>Tệp tài liệu</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>
                @if($item->image_path)
                    <img src="{{ asset('storage/' . $item->image_path) }}" width="60" class="img-thumbnail" alt="Ảnh">
                @else
                    <span class="text-muted">Không có ảnh</span>
                @endif
            </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category->name ?? 'Không có' }}</td>
            <td>{{ number_format($item->price, 2) }}</td>
            <td>
                @if($item->status == 'published')
                    <span class="badge bg-success">Published</span>
                @else
                    <span class="badge bg-secondary">Draft</span>
                @endif
            </td>
            <td>
                @if($item->document_path)
                    <a href="{{ route('admin.products.download', $item->id) }}" class="btn btn-sm btn-info text-white">Tải PDF/DOCX</a>
                @else
                    <span class="text-muted">Chưa có file</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.products.edit', $item->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                <form action="{{ route('admin.products.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Phân trang -->
<div class="d-flex justify-content-end">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
@endsection