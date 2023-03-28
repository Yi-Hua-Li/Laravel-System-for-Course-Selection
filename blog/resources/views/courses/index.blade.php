@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 style="text-align: center;">新增課堂</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('courses.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">課堂名稱</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="credit">學分數</label>
                        <input type="number" class="form-control" id="credit" name="credit">
                    </div>
                    <div class="form-group">
                        <label for="teacher">授課老師</label>
                        <input type="text" class="form-control" id="teacher" name="teacher">
                    </div>
                    <div class="form-group">
                        <label for="class_code">當期課號</label>
                        <input type="number" class="form-control" id="class_code" name="class_code">
                    </div>
                    <button type="submit" class="btn btn-primary">新增到所有課程中</button>
                </form>
            </div>
        </div>
    </div>
@endsection
