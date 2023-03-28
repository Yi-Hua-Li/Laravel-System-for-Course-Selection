@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-center mb-4">已選課程</h1>
                <table class="table table-striped table-hover" style="border-right: 1px solid #ddd;border-left: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <thead>
                    <tr>
                        <th style="border-right: 1px solid #ddd; font-size: 18px;">課程名稱</th>
                        <th style="border-right: 1px solid #ddd;  font-size: 18px;">學分數</th>
                        <th style="border-right: 1px solid #ddd;  font-size: 18px;">老師名稱</th>
                        <th style="border-right: 1px solid #ddd;  font-size: 18px;">當期課號</th>
                        <th style="text-align: center; font-size: 18px;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($selectedCourses as $selectedCourse)
                        <tr>
                            <td style="border-right: 1px solid #ddd; font-size: 18px;">{{ $selectedCourse->name }}</td>
                            <td style="border-right: 1px solid #ddd; font-size: 18px;">{{ $selectedCourse->credit }}</td>
                            <td style="border-right: 1px solid #ddd; font-size: 18px; ">{{ $selectedCourse->teacher }}</td>
                            <td style="border-right: 1px solid #ddd;  font-size: 18px;">{{ $selectedCourse->class_code }}</td>
                            <td>
                                <form action="{{ route('selectedcourses.destroy', $selectedCourse->id) }}" method="POST" onsubmit="return confirm('確定退選嗎?')" style="text-align: center;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">退選</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
