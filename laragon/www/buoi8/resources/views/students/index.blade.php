@extends('layouts.app')

@section('content')
    <h2>Danh sách Sinh viên và Khóa học đăng ký</h2>
    
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
        <tr>
            <th>ID</th>
            <th>Tên sinh viên</th>
            <th>Email</th>
            <th>Các khóa học</th>
        </tr>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    @if($student->courses->count() > 0)
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($student->courses as $course)
                                <li>{{ $course->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        Chưa đăng ký khóa học nào
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    
    <div style="margin-top: 15px;">
        {{ $students->links() }}
    </div>
@endsection