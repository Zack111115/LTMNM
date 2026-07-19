@extends('layouts.app')
@section('title', 'Giới thiệu khóa học')

@section('content')
    <x-card title="Mục tiêu học phần">
        <p>Trang bị kiến thức nền tảng về kiến trúc MVC, giúp sinh viên vận dụng thành thạo Laravel Framework để xây dựng và phát triển các ứng dụng web thực tế.</p>
    </x-card>

    <x-card title="Lịch 7 buổi lab">
        <ul>
            <li>Buổi 1: Giới thiệu Laravel Framework và cài đặt môi trường</li>
            <li>Buổi 2: Route cơ bản, Controller và Blade Template</li>
            <li>...</li>
        </ul>
    </x-card>
@endsection