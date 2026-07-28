<!-- resources/views/products/advanced.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>1. Sản phẩm có giá > 100.000</h2>
    <table>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
        </tr>
        @foreach($products as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ number_format($p->price) }} đ</td>
            </tr>
        @endforeach
    </table>

    <h2>2. Số lượng sản phẩm mỗi danh mục</h2>
    <table>
        <tr>
            <th>Tên danh mục</th>
            <th>Số lượng sản phẩm</th>
        </tr>
        @foreach($categories as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->products_count }}</td>
            </tr>
        @endforeach
    </table>

    <h2>3. Sinh viên và số môn học đã đăng ký</h2>
    <table>
        <tr>
            <th>Tên sinh viên</th>
            <th>Số môn học</th>
        </tr>
        @foreach($students as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td>{{ $s->courses_count }}</td>
            </tr>
        @endforeach
    </table>
@endsection