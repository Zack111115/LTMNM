@extends('layouts.app')

@section('content')
    <h2>Sửa sản phẩm</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 10px;">
            <label>Tên sản phẩm:</label><br>
            <input type="text" name="name" value="{{ $product->name }}" required>
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Giá:</label><br>
            <input type="number" name="price" value="{{ $product->price }}" required>
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Tồn kho:</label><br>
            <input type="number" name="stock" value="{{ $product->stock }}" required>
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Danh mục:</label><br>
            <select name="category_id">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit">Cập nhật</button>
    </form>
@endsection