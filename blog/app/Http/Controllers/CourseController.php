<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $selected_courses = Selectedcourse::where('user_id', auth()->id())->get();
        $selected_course_ids = $selected_courses->pluck('course_id')->toArray();
        return view('courses.index', compact('selected_course_ids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('courses.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'credit' => 'required',
            'teacher' => 'required',
            'class_code' => 'required',
        ]);

        $course = new Course;
        $course->name = $request->input('name');
        $course->credit = $request->input('credit');
        $course->teacher = $request->input('teacher');
        $course->class_code = $request->input('class_code');
        $course->save();


        return redirect()->route('allclass');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $request->validate([
            'name' => 'required',
            'credit' => 'required',
            'teacher' => 'required',
            'class_code' => 'required',
        ]);

        $course->name = $request->input('name');
        $course->credit = $request->input('credit');
        $course->teacher = $request->input('teacher');
        $course->class_code = $request->input('class_code');
        $course->save();

        return redirect()->route('courses.edit', [$course->id])->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        $course->delete();

        return  redirect()->to('/');
    }
    public function search(Request $request)
    {
        $name = $request->input('name');
        $credits = $request->input('credits');
        $teacher = $request->input('teacher');
        $class_code = $request->input('class_code');

        $courses = Course::query();

        if ($name) {
            $courses->where('name', 'like', '%' . $name . '%');
        }

        if ($credits) {
            $courses->where('credit', 'like', '%' . $credits . '%');
        }

        if ($teacher) {
            $courses->where('teacher', 'like', '%' . $teacher . '%');
        }

        if ($class_code) {
            $courses->where('class_code', 'like', '%' . $class_code . '%');
        }

        $courses = $courses->get();

        $selectedCourseIds = auth()->user()->selectedCourses->pluck('course_id')->toArray();

        return view('courses.search', compact('courses', 'selectedCourseIds'));
    }

}
