@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>編輯課堂內容</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        Updated Successfully!
                    </div>
                @endif

                <form action="{{ route('courses.update', [$course->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">課堂名稱</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$course->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="credit">學分數</label>
                        <input type="number" class="form-control" id="credit" name="credit" value="{{ old('credit',$course->credit) }}">
                    </div>
                    <div class="form-group">
                        <label for="teacher">授課老師</label>
                        <input type="text" class="form-control" id="teacher" name="teacher" value="{{ old('teacher',$course->teacher) }}">
                    </div>
                    <div class="form-group">
                        <label for="class_code">當期課號</label>
                        <input type="number" class="form-control" id="class_code" name="class_code" value="{{ old('class_code',$course->class_code) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">確定編輯</button>
                </form>
                <hr>
                <form action="{{route('courses.destroy', [$course->id])}}" method="post" onsubmit="return confirm('刪除後將無法復原,確定刪除嗎?')">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">刪除該課程</button>
                </form>
            </div>
        </div>
    </div>
@endsection
