@extends('layouts.app')

@section('content')
    <h2>Thêm sản phẩm mới</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Tên sản phẩm:</label><br>
            <input type="text" name="name" required>
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Giá:</label><br>
            <input type="number" name="price" required>
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Tồn kho:</label><br>
            <input type="number" name="stock" required>
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Danh mục:</label><br>
            <select name="category_id">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit">Lưu sản phẩm</button>
    </form>
@endsection