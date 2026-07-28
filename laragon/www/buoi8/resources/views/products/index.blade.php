@extends('layouts.app')

@section('content')
    <h2>Danh sách sản phẩm</h2>
    <a href="{{ route('products.create') }}" style="display:inline-block; margin-bottom: 15px;">+ Thêm sản phẩm mới</a>
    
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
        <tr>
            <th>Tên</th>
            <th>Giá</th>
            <th>Tồn kho</th>
            <th>Danh mục</th>
            <th>Thao tác</th>
        </tr>
        @foreach($products as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ number_format($p->price) }} đ</td>
                <td>{{ $p->stock }}</td>
                <td>{{ $p->category->name }}</td>
                <td>
                    <a href="{{ route('products.edit', $p->id) }}">Sửa</a>
                    |
                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    
    <div style="margin-top: 15px;">
        {{ $products->links() }}
    </div>
@endsection