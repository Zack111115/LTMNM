@extends('layouts.app')
@section('title', 'Thêm sinh viên mới')

@section('content')
    <h2>Thêm sinh viên mới</h2>

    <form action="{{ url('/students') }}" method="POST">
        @csrf

        <div style="margin-bottom: 10px;">
            <label>Họ tên:</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <span style="color: red; font-size: 14px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <span style="color: red; font-size: 14px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label>Tuổi:</label>
            <input type="number" name="age" value="{{ old('age') }}">
            @error('age') <span style="color: red; font-size: 14px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label>Giới tính:</label>
            <select name="gender">
                <option value="">Chọn giới tính</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Nam</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Nữ</option>
            </select>
            @error('gender') <span style="color: red; font-size: 14px;">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Lưu sinh viên</button>
    </form>
@endsection