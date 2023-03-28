@extends('layouts.app')

@section('content')
    <h1 class="text-center">搜尋課程</h1>
    <div class="container">
        <form action="{{ route('courses.search') }}" method="GET">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="name">課堂名稱</label>
                        <input type="text" name="name" class="form-control" placeholder="請輸入課堂名稱">
                    </div>
                    <div class="form-group">
                        <label for="credits">學分數</label>
                        <input type="text" name="credits" class="form-control" placeholder="請輸入學分數">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="teacher">教師名字</label>
                        <input type="text" name="teacher" class="form-control" placeholder="請輸入教師名字">
                    </div>
                    <div class="form-group">
                        <label for="class_code">當期課號</label>
                        <input type="text" name="class_code" class="form-control" placeholder="請輸入當期課號">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block">搜尋</button>
                </div>
            </div>
        </form>
    </div>
@endsection
