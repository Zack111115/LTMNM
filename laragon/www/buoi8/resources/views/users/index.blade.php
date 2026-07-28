@extends('layouts.app')

@section('content')
    <h2>Thông tin Hồ sơ Người dùng (One to One)</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <!-- Kiểm tra xem user có profile không rồi mới hiển thị -->
                <td>{{ $user->profile->address ?? 'Chưa cập nhật' }}</td>
                <td>{{ $user->profile->phone ?? 'Chưa cập nhật' }}</td>
            </tr>
        @endforeach
    </table>
@endsection