@extends('layouts.app')

@section('content')
    <h1 class="text-center">所有課程</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                @php
                    $selected_course_ids = Auth::user()->selectedCourses()->pluck('course_id')->toArray();
                @endphp
                @foreach (App\Course::orderBy('created_at','DESC')->get() as $course)
                    @php
                        $selected = Auth::user()->selectedCourses()->where('course_id', $course->id)->exists();
                    @endphp
                    <div class="card" style="line-height: 40px; font-size: 17px;font-weight: bold; word-spacing: 20px;margin-top: 15px;margin-bottom: 25px;">
                        <div class="card-header d-flex justify-content-between" style="display: grid; grid-template-columns: repeat(4, 1fr); align-items: center;">
                            <span>課堂:{{ $course->name }}</span>
                            <span>教師:{{ $course->teacher }}</span>
                            <span>學分數:{{ $course->credit }}</span>
                            <span>當期課號:{{ $course->class_code }}</span>
                            <a href="{{ route( 'courses.edit',[$course->id]) }}">(編輯)</a>
                            @if($selected)
                                <button class="btn btn-secondary" style="font-size: 18px;" disabled>已選課</button>
                            @else
                                <form method="POST" action="{{ route('selectedcourses.store', [$course->id]) }}">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <button type="submit" class="btn btn-primary" style="font-size: 18px;">選課</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <style>
        .card-header > *:not(:last-child) {
            margin-right: 10px;
        }
    </style>
@endsection
