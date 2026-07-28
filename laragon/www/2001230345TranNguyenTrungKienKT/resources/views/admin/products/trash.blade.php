@extends('admin.layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Thùng rác sản phẩm</h3>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>

<table class="table table-bordered table-hover align-middle mt-4">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Ngày xóa</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->deleted_at->format('d/m/Y H:i') }}</td>
            <td>
                <!-- Nút Khôi phục -->
                <form action="{{ route('admin.products.restore', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-success">Khôi phục</button>
                </form>

                <!-- Nút Xóa vĩnh viễn -->
                <form action="{{ route('admin.products.forceDelete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hành động này sẽ xóa file vĩnh viễn. Bạn có chắc chắn?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Xóa vĩnh viễn</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted">Thùng rác rỗng</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-end">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
@endsection